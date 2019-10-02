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
            /* https://www.php.net/manual/pt_BR/function.move-uploaded-file.php */
            /* https://www.php.net/manual/pt_BR/features.file-upload.post-method.php */
        }
    }
}