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
    }

    public function gameOver()
    {
        $this->resetarGame();
        $this->view('enigmas/GameOver.php');
    }

    public function winner()
    {
        $this->resetarGame();
        $this->view('enigmas/Winner.php');
    }

    public function setFases()
    {
        switch ($_SESSION['fase']) {
            case 1:
                $this->setTentativas(1);
                break;
            case 2:
                $this->setTentativas(1);
                break;
            case 3:
                $this->setTentativas(2);
                break;
            case 4:
                $this->setTentativas(2);
                break;
            case 5:
                $this->setTentativas(3);
                break;
            case 6:
                $this->setTentativas(3);
                break;
            case 7:
                $this->setTentativas(4);
                break;
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
                $ACERTOU = $this->verificaRespota();
                if(!$ACERTOU){
                    //Buscar Dica
                }
                $this->incrementTentativas();
                break;
            case 2:
                $ACERTOU = $this->verificaRespota();
                if(!$ACERTOU){
                    //Buscar Dica
                }
                $this->incrementTentativas();
                break;
            case 3:
                $ACERTOU = $this->verificaRespota();
                if(!$ACERTOU){
                    //Buscar Dica
                }
                $this->incrementTentativas();
                break;
            case 4:
                $ACERTOU = $this->verificaRespota();
                if(!$ACERTOU){
                    //Buscar Dica
                }
                $this->incrementTentativas();
                break;
            case 5:
                $ACERTOU = $this->verificaRespota();
                if(!$ACERTOU){
                    //Buscar Dica
                }
                $this->incrementTentativas();
                break;
            case 6:
                $ACERTOU = $this->verificaRespota();
                if(!$ACERTOU){
                    //Buscar Dica
                }
                $this->incrementTentativas();
                break;
            case 7:
                $ACERTOU = $this->verificaRespota();
                if(!$ACERTOU){
                    //Buscar Dica
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
            $this->incrementTentativas(true);
            $this->incrementFase();
            $this->incrementConcluidos();
            return $this->setFases();
        }

        $this->view('enigmas/Fase.php',[
            'enigma' => $this->enigma,
            'dica' => 'Vamos ver se você e bom mesmo!',
            'fase' => $_SESSION['fase'],
            'tentativas' => $_SESSION['tentativas']
        ]);
    }

    public function verificaRespota()
    {
        $id = $_POST['id'];
        $resposta = $_POST['resposta'];
        $this->enigma = $this->banco->select("SELECT * FROM enigmas WHERE id_enigmas = ?",[$id],false);
        if($resposta == $this->enigma['resposta']){
            return true;
        }else{
            return false;
        }
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
}