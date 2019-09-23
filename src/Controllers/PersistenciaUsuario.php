<?php


namespace Arcanos\Enigmas\Controllers;


class PersistenciaUsuario extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        if (isset($_POST['usuario'])) {
            $usuario = $_POST['usuario'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $confsenha = $_POST['confsenha'];

            if ($senha < 4) {
               ;
            }

            //$retorno = $this->usuarios->cadastrarUsuario($nome_usuario,2,$email,$senha)
        
            echo $usuario, $email, $senha, $confsenha;
            
        }
    }
}





