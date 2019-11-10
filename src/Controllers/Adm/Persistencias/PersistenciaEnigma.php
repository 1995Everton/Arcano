<?php


namespace Arcanos\Enigmas\Controllers\Adm\Persistencias;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class PersistenciaEnigma extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        if ((isset($_POST)) && (!empty($_POST))) {
            $dificuldade = $_POST['dificuldade']; //Armazena o valor do campo Dificuldade
            $tipo = $_POST['tipo']; //Armazena o valor do campo TIPO
            $enigma = $_POST['enigma']; //$_FILES['arquivo']['error'];//Armazena o valor do campo arquivo
            $resposta = $_POST['resposta']; //Armazena o valor do campo de Resposta
            $imagem = $_FILES['arquivo']; //$_FILES['arquivo']['tmp_name']; //salva o nome da imagem
            $erro = null; //Var para validaçao de erros
            $URL = null; // Salva a url das imagens

            /* Validacao dos campos do formulário */
            if (!isset($dificuldade) || (empty($dificuldade))) {
                $erro = 'Verifique o campo de Dificuldade';
            } elseif ((!isset($tipo)) || (empty($tipo))) {
                $erro = 'Verifique o campo Tipo';
            } elseif ((!isset($resposta)) || (empty($resposta))) {
                $erro = 'Verifique o campo Resposta';
            } elseif ($tipo == 1) {
                if (!isset($enigma) || (empty($enigma))) {
                    $erro = 'Preencha corretamente o campo Enigma!';
                }
            } elseif ((!isset($imagem) || (empty($imagem)))) {
                $erro = 'Se enigma for do tipo: Imagem, Audio ou Video é necessario anexar uma arquivo!';
            }

            /* Não me pergunte */
            if (!empty($imagem['tmp_name'])) {
                $arquivo_temporario = $imagem['tmp_name'];
                $nome_arquivo = date_timestamp_get(date_create()) . basename($imagem['name']);
                $diretorio = '../public/img/uploaded_arqs/';

                if (move_uploaded_file($arquivo_temporario, $diretorio . $nome_arquivo)) {
                    $URL = "http://" . $_SERVER['SERVER_NAME'] . "/" . "Arcano" . "/public/img/uploaded_arqs/" . $nome_arquivo; //url que vai para o banco
                } else {
                    $erro = 'Erro no envio do arquivo!';
                }
            } else {
                $erro = 'Se enigma for do tipo: Imagem, Audio ou Video é necessario anexar uma arquivo!';
            }

            /* Validaçao se cadastra no banco ou Retorna mensagem de erro; */
            if (!isset($erro)) {
                if (!empty($enigma)) {
                    $this->cadastraEnigma($dificuldade, $tipo, $enigma, $resposta);
                } else {
                    $this->cadastraEnigma($dificuldade, $tipo, $URL, $resposta);
                }
                $this->toast($erro, 'ERRO', 'danger');
                header("Location: index.php?pagina=enigma-cadastro");
            } else {
                $this->toast($erro, 'ERRO', 'danger');
                header("Location: index.php?pagina=enigma-cadastro");
            }
        } else {
            $this->toast('Erro no envio do formulário!', 'ERRO', 'danger');
            header("Location: index.php?pagina=enigma-cadastro");
        }
    }

    /* Inserção de dados no banco de dados */
    public function cadastraEnigma($dificuldade, $tipo, $enigma, $resposta)
    {
        $this->banco->insert(
            'enigmas',
            [
                'dificuldade_enigma_id' => $dificuldade,
                'enigmas_tipos_id' => $tipo,
                'enigma' => $enigma = $enigma,
                'data' => date('Y-m-d'),
                'resposta' => $resposta
            ]
        );
    }
}
