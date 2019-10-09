<?php


namespace Arcanos\Enigmas\Controllers;


class PersistenciaEnigma extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        if ((isset($_POST)) && (!empty($_POST))) {
            $dificuldade = $_POST['dificuldade'];
            $tipo = $_POST['tipo'];
            $enigma = $_POST['enigma'];
            $resposta = $_POST['resposta'];

            /* Validacao do campo dificuldade */
            if (!isset($dificuldade) || (empty($dificuldade))) {
                $this->toast('Erro no campo Dificuldade', 'ERRO', 'danger');
                header("Location: index.php?pagina=enigma-cadastro");
            } elseif ((!isset($tipo)) || (empty($tipo))) {
                $this->toast('Erro no campo Tipo', 'ERRO', 'danger');
                header("Location: index.php?pagina=enigma-cadastro");
            } elseif ((!isset($enigma)) || (empty($enigma))) {
                $this->toast('Erro no campo Enigma', 'ERRO', 'danger');
                header("Location: index.php?pagina=enigma-cadastro");
            } elseif ((!isset($resposta)) || (empty($resposta))) {
                $this->toast('Todo enigma precisa de uma resposta!', 'ERRO', 'danger');
                header("Location: index.php?pagina=enigma-cadastro");
            }
            echo "<pre>";
            var_dump($_POST);
            echo "</pre>";

            echo "<br>";

            /* ARQUIVO */
            echo "<pre>";
            print_r($_FILES['arquivo']);
            echo "</pre>";


            if (!empty($_FILES['arquivo'])) {
                $arquivo_temporario = $_FILES['arquivo']['tmp_name'];
                $arquivo = date_timestamp_get(date_create()) . basename($_FILES['arquivo']['name']);
                $diretorio = '../public/img/uploaded_arqs/';
            

            //$arquivo = $diretorio . basename($_FILES['arquivo']['name']);//que vai pro Banco
                echo $diretorio . $arquivo;

                if (move_uploaded_file($arquivo_temporario, $diretorio . "/" . $arquivo)) {
                    echo "Arquivo válido e enviado com sucesso.\n";
                } else {
                    echo "Erro no envio!";
                }
            } else {
                echo "Sem arquivo!";
            }
            /* Inserção de dados no banco de dados */
            /* $this->banco->insert(
                'enigmas',
                [
                    'dificuldade_enigma_id' => $_POST['dificuldade'],
                    'enigmas_tipos_id' => $_POST['tipo'],
                    'enigma' => $enigma = (isset($_FILES['arquivo'])) ? $arquivo : utf8_encode($_POST['enigma']),
                    'data' => date('Y-m-d'),
                    'resposta' => utf8_encode($_POST['resposta'])
                ]
            ); */

            /* https://www.php.net/manual/pt_BR/function.move-uploaded-file.php */
            /* https://www.php.net/manual/pt_BR/features.file-upload.post-method.php */
            /* https://www.youtube.com/watch?v=qmNbZmBOaGM */
        } else {
            echo "Falha no fenvio do formulário";
        }
    }
}