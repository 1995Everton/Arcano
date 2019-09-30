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
    
            
            
            foreach ($dados as $key => $value) {
                if ($value->nome_usuario == $usuario ) {
                    
                    header("Location: index.php?pagina=cadastro&msg=2");
                    
                }
                elseif ($value->email == $email) {
                    header("Location: index.php?pagina=cadastro&msg=3");
                }
            }

            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                
            }
            else
            {
                header("Location: index.php?pagina=cadastro&msg=1");
            }

            

            if ($senha != $confsenha) {


                header("Location: index.php?pagina=cadastro&msg=4");
               
            }
            
            $this->banco->insert('usuarios',
                [
                    'categoria_usuarios_id' => 2,
                    'nome_usuario' => $usuario,
                    'senha' => $this->criptografar($senha),
                    'email' => $email
                ]
            );
            header("Location: index.php?pagina=login");

            //criar função para validar senha, na barra de favoritos tem sites para ajudar
            //$retorno = $this->usuarios->cadastrarUsuario($nome_usuario,2,$email,$senha)
        
            //echo $usuario, $email, $senha, $confsenha;
            
        
    }
}





