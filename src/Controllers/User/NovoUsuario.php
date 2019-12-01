<?php


namespace Arcanos\Enigmas\Controllers\User;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class NovoUsuario extends Banco implements RequestHandlerInterface
{
    public function handle()
    {

        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confsenha = $_POST['confsenha'];
        $erros = [];
        $dados = $this->banco->select("SELECT * FROM usuarios WHERE nome_usuario = ? OR email = ?",[$usuario, $email],true);

        if ($dados) {
            foreach ($dados as $key => $value) {
                if ($value['nome_usuario'] == $usuario ) $erros[] = 'Já Existe Um Usuário Com Esse Nickname';
                if ($value['email'] == $email)  $erros[] = 'Esse E-Mail Já Foi Cadastrado';
            }
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))  $erros[] = 'E-mail Invalido';
        if ($senha != $confsenha)   $erros[] = 'Senhas não batem';

        if(count($erros) > 0){
            $this->allToast($erros);
            header("Location: index.php?pagina=cadastro");
        }else{
            $this->banco->insert('usuarios',
                [
                    'categoria_usuarios_id' => 2,
                    'nome_usuario' => $usuario,
                    'senha' => $this->criptografar($senha),
                    'email' => $email
                ]
            );
            $this->toast('Cadastro realizado com susseso, logue para ativar sua conta','','success');
            header("Location: index.php?pagina=home");
        }
    }
}





