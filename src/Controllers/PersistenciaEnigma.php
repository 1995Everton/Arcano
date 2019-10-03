<?php


namespace Arcanos\Enigmas\Controllers;


class PersistenciaEnigma extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        if(isset($_POST)){
            echo "<pre>";
            var_dump($_POST);
            echo "</pre>";

            echo "<br>";
            
            /* data */
            $data = date('Y-m-d');

            /* ARQUIVO */
            echo "<pre>";
            print_r($_FILES['arquivo']);
            echo "</pre>";

            /* Mover o file // diretório*/
            /* Cheio de coisa para fazer aqui!! */
            $diretorio = '../public/img/uploaded_arqs/';
            $arquivo = $diretorio . basename($_FILES['arquivo']['name']);//que vai pro Banco
            
            if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $arquivo)) {
                echo "Arquivo válido e enviado com sucesso.\n";
            }else{
                echo "Sem arquivo!";
            }
            
            /* Inserção de dados no banco de dados */
            $this->banco->insert('enigmas',
                        [
                'dificuldade_enigma_id' => $_POST['dificuldade'],
                'enigmas_tipos_id' => $_POST['tipo'],
                'enigma' => utf8_encode($_POST['enigma']),
                'data' => date('Y-m-d'),
                'resposta' => utf8_encode($_POST['resposta'])
            ]
            );

            /* https://www.php.net/manual/pt_BR/function.move-uploaded-file.php */
            /* https://www.php.net/manual/pt_BR/features.file-upload.post-method.php */
            /* https://www.youtube.com/watch?v=qmNbZmBOaGM */
        }
    }
}