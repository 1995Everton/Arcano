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
            $diretorio = '../public/img/';
            $arquivoUPADO = $diretorio . basename($_FILES['arquivo']['name']);
            
            if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $arquivoUPADO)) {
                echo "Arquivo válido e enviado com sucesso.\n";
            }

            /* https://www.php.net/manual/pt_BR/function.move-uploaded-file.php */
            /* https://www.php.net/manual/pt_BR/features.file-upload.post-method.php */
            /* https://www.youtube.com/watch?v=qmNbZmBOaGM */
        }
    }
}