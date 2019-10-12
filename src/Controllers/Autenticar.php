<?php
/**
 * Created by PhpStorm.
 * User: everton_p_cardoso
 * Date: 23/09/2019
 * Time: 20:48
 */

namespace Arcanos\Enigmas\Controllers;


class Autenticar extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        if(isset($_GET['acao'])){
            unset($_SESSION['nome_usuario']);
            unset($_SESSION['id_usuarios']);
            return header('Location: index.php?pagina=login');
        }else{
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $usuario = $this->banco->select("SELECT * FROM usuarios WHERE email = ?",[$email],false);
            if($usuario && $this->compararHash($senha,$usuario['senha'])){
                $_SESSION['nome_usuario'] = $usuario['nome_usuario'];
                $_SESSION['id_usuarios'] = $usuario['id_usuarios'];
                $_SESSION['url_foto'] = $usuario['url_foto'];
                $_SESSION['tipo_usuario'] = $usuario['categoria_usuarios_id'];
                $this->toast('Logado com Sucesso!','Bem Vindo!','success');
                header('Location: index.php?pagina=home');
            }else{
                $this->toast('Login ou Senha Inválidos!','Falha!','danger');
                header('Location: index.php?pagina=login');
            }
        }
    }

}