<?php


namespace Arcanos\Enigmas\Controllers\Adm\Persistencias;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class PersistenciaEnigma extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        if ((isset($_POST)) && (!empty($_POST))) {
            $dificuldade = $_POST['dificuldade'];//Armazena o valor do campo Dificuldade
            $tipo = $_POST['tipo'];//Armazena o valor do campo TIPO
            
            $enigma = (isset($_POST['enigma'])) ? $_POST['enigma'] : validaArquivo(); //$_FILES['arquivo']['error'];//Armazena o valor do campo arquivo

            $resposta = $_POST['resposta'];//Armazena o valor do campo de Resposta
            $erro; //Var para validaçao de erros

            /* Validacao dos campos do formulário */
            if (!isset($dificuldade) || (empty($dificuldade))) {
                $erro = 'Verifique o campo de Dificuldade';
            } elseif ((!isset($tipo)) || (empty($tipo))) {
                $erro = 'Verifique o campo Tipo';
            } elseif ((!isset($enigma)) || (empty($enigma))) {
                $erro = 'Verifique o preenchimento do campo enigma';
            } elseif ((!isset($resposta)) || (empty($resposta))) {
                $erro = 'Verifique o campo Resposta';
            } /* elseif () {
                $erro = 'Sem arquivo selecionado';
            } */

            function validaArquivo()
            {
                $ark = $_FILES['arquivo']['error'];

                return $ark;
            }


            /* Validaçao se cadastra no banco ou Retorna mensagem de erro; */
            if (isset($erro)) {
                $this->cadastraEnigma($dificuldade);
            } else {
                $this->toast($erro, 'ERRO', 'danger');
                header("Location: index.php?pagina=enigma-cadastro");
            }

            /* MORE QUESTIONS, se o tipo do enigma for img campo de arquivo 'e requirido como img. se for do tipo texto o campo 'enigma' 'e*/
            echo "<pre>";
            var_dump($_POST);
            echo "</pre>";

            echo "<br>";

            /* ARQUIVO */
            echo "<pre>";
            print_r($_FILES['arquivo']);
            echo "</pre>";


           /*  if (!empty($_FILES['arquivo'])) {
                $arquivo_temporario = $_FILES['arquivo']['tmp_name'];
                $arquivo = date_timestamp_get(date_create()) . basename($_FILES['arquivo']['name']);
                $diretorio = '../public/img/uploaded_arqs/';           
             */
            //$arquivo = $diretorio . basename($_FILES['arquivo']['name']);//que vai pro Banco
          /*       echo $diretorio . $arquivo;

                if (move_uploaded_file($arquivo_temporario, $diretorio . "/" . $arquivo)) {
                    echo "Arquivo válido e enviado com sucesso.\n";
                } else {
                    echo "Erro no envio!";
                }
            } else {
                echo "Sem arquivo!";
            } */
            /* https://www.php.net/manual/pt_BR/function.move-uploaded-file.php */
            /* https://www.php.net/manual/pt_BR/features.file-upload.post-method.php */
            /* https://www.youtube.com/watch?v=qmNbZmBOaGM */
        } else {
            $this->toast('Erro no envio do formulário!', 'ERRO', 'danger');
            header("Location: index.php?pagina=enigma-cadastro");
        }


    }

    /* Inserção de dados no banco de dados */
    public function cadastraEnigma($dificuldade)
    {
        echo "teste + " . $dificuldade;
        /* $this->banco->insert(
            'enigmas',
            [
                'dificuldade_enigma_id' => $this->handle($dificuldade),
                'enigmas_tipos_id' => s,
                'enigma' => $enigma = (isset($_FILES['arquivo'])) ? $arquivo : utf8_encode($_POST['enigma']),
                'data' => date('Y-m-d'),
                'resposta' => utf8_encode($_POST['resposta'])
            ]
        ); */
    }
}