<?php


namespace Arcanos\Enigmas\Controllers\Enigmas;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class EnigmaFase extends Banco implements RequestHandlerInterface
{
    private $enigma;

    public function handle()
    {
        if(!isset($_POST['id']) || !isset($_SESSION['fase']) || !isset($_SESSION['tentativas']) || !isset($_SESSION['concluidos'])){
            $this->resetarGame();
        }
        $this->setFases();
    }

    public function resetarGame()
    {
        $_SESSION['fase'] = 1;
        $_SESSION['tentativas'] = 0;
        $_SESSION['concluidos'] =[0] ;
        $_SESSION['dicas_concluidas'] =[0] ;
        $_SESSION['pontuacao'] = 0 ;
    }

    public function save()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('Y-m-d H:i:s');
        $progresso = (int) round(($_SESSION['fase'] - 1 )/8 * 100);
        $pontos = (int) $_SESSION['pontuacao'];
        $id_enigmas = (int) $_POST['id'];
        $id_usuarios =(int) $_SESSION['id_usuarios'];
        $sucesso = $this->banco->insert('pontuacao',[
            'usuarios_pontuacao_id' => $id_usuarios,
            'enigmas_pontuacao_id' => $id_enigmas,
            'pontos' => $pontos,
            'data' => $data,
            'progresso' => $progresso
        ]);
        if($sucesso){
            $this->toast('Pontuação salva com sucesso!','Parabêns','success');
        }else{
            $this->toast('Erro ao salvar Pontuação!','Sinto Muito','danger');
        }
    }

    public function gameOver()
    {
        $this->save();
        $this->resetarGame();
        $this->view('enigmas/GameOver.php');
    }

    public function winner()
    {
        $this->save();
        $this->resetarGame();
        $this->view('enigmas/Winner.php');
    }

    public function setFases()
    {
        switch ($_SESSION['fase']) {
            case 1:
            case 2:
                $this->setTentativas(1);
                break;
            case 3:
            case 4:
                $this->setTentativas(2);
                break;
            case 5:
            case 6:
                $this->setTentativas(3);
                break;
            case 7:
            case 8:
                $this->setTentativas(4);
                break;
            case 9:
                $this->winner();
                break;
        }
    }

    public function setTentativas($dificuldade)
    {
        $ACERTOU = false;
        $dica = '';
        switch ($_SESSION['tentativas']) {
            case 0:
                $not = array_map(function($value) { return '?';},$_SESSION['concluidos']);
                $not = join(",",$not);
                $sql = "SELECT * FROM enigmas where id_enigmas not in($not) AND dificuldade_enigma_id = ? ORDER BY RAND() LIMIT 1";
                $where = array_merge($_SESSION['concluidos'],[$dificuldade]);
                $this->enigma = $this->banco->select($sql,$where,false);
                $this->incrementTentativas();
                break;
            case 1:
            case 2:
            case 4:
            case 6:
                $ACERTOU = $this->verificaRespota();
                $this->incrementTentativas();
                break;
            case 3:
                $ACERTOU = $this->verificaRespota();
                if(!$ACERTOU){
                    $dica = $this->buscarDica($_POST['id'],1);
                }
                $this->incrementTentativas();
                break;
            case 5:
                $ACERTOU = $this->verificaRespota();
                if(!$ACERTOU){
                    $dica = $this->buscarDica($_POST['id'],2);
                }
                $this->incrementTentativas();
                break;
            case 7:
                $ACERTOU = $this->verificaRespota();
                if(!$ACERTOU){
                    $dica = $this->buscarDica($_POST['id'],3);
                }
                $this->incrementTentativas();
                break;
            case 8:
                $ACERTOU = $this->verificaRespota();
                if(!$ACERTOU){
                    $this->gameOver();
                    return false;
                }
                break;
        }
        if($ACERTOU){
            $this->totalizador();
            $this->incrementTentativas(true);
            $this->incrementFase();
            $this->incrementConcluidos();
            return $this->setFases();
        }
        if(!$dica) $dica = $this->fraseAleatoria();
        $this->view('enigmas/Fase.php',[
            'enigma' => $this->enigma,
            'dica' => $dica,
            'fase' => $_SESSION['fase'],
            'tentativas' => $_SESSION['tentativas']
        ]);
    }

    public function verificaRespota()
    {
        $id = $_POST['id'];
        $resposta = strtoupper(trim($_POST['resposta']));
        $this->enigma = $this->banco->select("SELECT * FROM enigmas WHERE id_enigmas = ?",[$id],false);
        if($resposta == $this->strtoupper(trim(enigma['resposta']))){
            return true;
        }else{
            return false;
        }
    }

    public function buscarDica($id_enigmas,$categoria)
    {
        $not = array_map(function($value) { return '?';},$_SESSION['dicas_concluidas']);
        $not = join(",",$not);
        $sql = "SELECT * FROM dicas WHERE id_dicas NOT IN($not) AND dicas_enigmas_id = ? AND categoria_dicas_id = ? ORDER BY RAND() LIMIT 1";
        $where = array_merge($_SESSION['dicas_concluidas'],[$id_enigmas,$categoria]);
        $dica = $this->banco->select($sql,$where,false);
        if($dica){
            $this->incrementDicas($dica);
            return $dica['dica'];
        }else{
            return false;
        }
    }

    public function fraseAleatoria()
    {
        $frase = [
            'Vamos ver se você e bom, jovem mestre!',
            'Melhor rezar, pois não vou lhe ajudar!',
            'Está sentido o cheiro de queimado!? : )',
            'Vai demorar muito, tenho um encontro hoje!',
            'Por que não desiste de uma vez, bricadeira : )',
            'Sei que logo você vai acertar!'
        ];
        return $frase[array_rand($frase,1)];
    }

    public function totalizador()
    {
        $_SESSION['pontuacao'] += 100/$_SESSION['tentativas'];
    }
    public function incrementTentativas($zerar = false)
    {
        if($zerar){
            $_SESSION['tentativas'] = 0;
        }else{
            $_SESSION['tentativas'] +=1;
        }
    }
    public function incrementFase()
    {
        $_SESSION['fase'] +=1;
    }
    public function incrementConcluidos()
    {
        $_SESSION['concluidos'][] = $this->enigma['id_enigmas'];
    }
    public function incrementDicas($dica)
    {
        $_SESSION['dicas_concluidas'][] = $dica['id_dicas'];
    }
}