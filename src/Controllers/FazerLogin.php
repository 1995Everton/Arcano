<?php
/**
 * Created by PhpStorm.
 * User: everton_p_cardoso
 * Date: 23/09/2019
 * Time: 20:48
 */

namespace Arcanos\Enigmas\Controllers;


class FazerLogin extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $usuario = $this->banco->select("SELECT * FROM usuarios WHERE email = ?",[$email],false);
        if($usuario && $this->compararHash($senha,$usuario['senha'])){
            $_SESSION['usuario'] = $usuario['nome_usuario'];
            $_SESSION['usuario'] = $usuario['id_usuarios'];
            header('Location: index.php?pagina=enigma-home');
        }else{
            header('Location: index.php?pagina=login');
        }
    }
}