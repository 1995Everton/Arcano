<?php


namespace Arcanos\Enigmas\Controllers;


class PersistenciaUsuario extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confsenha = $_POST['confsenha'];

        $dados = $this->banco->select("SELECT * FROM usuarios WHERE nome_usuario = ? OR email = ?",[$usuario, $email],true);
    
            
        if ($dados) {    
            foreach ($dados as $key => $value) {
                if ($value['nome_usuario'] == $usuario ) {
                    $this->toast('Usuario já cadastrado','ERRO','danger');
                    header("Location: index.php?pagina=cadastro");
                    
                }
                elseif ($value['email'] == $email) {

                    $this->toast('Email já cadastrado','ERRO','danger');
                    header("Location: index.php?pagina=cadastro");
                
                }
            }

            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                
            }
            else
            {
                $this->toast('Email invalido','ERRO','danger');
                header("Location: index.php?pagina=cadastro");
            }

            

            if ($senha != $confsenha) {

                $this->toast('Senhas não batem','ERRO','danger');
                header("Location: index.php?pagina=cadastro");
               
            }            
            //criar função para validar senha, na barra de favoritos tem sites para ajudar
            //$retorno = $this->usuarios->cadastrarUsuario($nome_usuario,2,$email,$senha)
        
            //echo $usuario, $email, $senha, $confsenha;
        }else {
            $this->banco->insert('usuarios',
                [
                    'categoria_usuarios_id' => 2,
                    'nome_usuario' => $usuario,
                    'senha' => $this->criptografar($senha),
                    'email' => $email
                ]
            );
            $this->toast('Cadastro realizado com susseso','','success');
            header("Location: index.php?pagina=home");
        }     
            
            
        
    }
}





