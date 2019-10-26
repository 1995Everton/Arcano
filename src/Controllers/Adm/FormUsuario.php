<?php


namespace Arcanos\Enigmas\Controllers\Adm;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class FormUsuario extends Banco implements RequestHandlerInterface
{

    public function handle()
    {
        $usuario = [
            'nome_usuario' => '',
            'email' => '',
            'url_foto' => '',
            'categoria_usuarios_id' => 2
        ];
        $titulo = 'Cadastra Usuário';
        $titulo_button = 'Cadastrar';
        $url_post = '&acao=novo';
        $tipo_usuario = $this->banco->select("SELECT * FROM categoria_usuarios");
        if(isset($_GET['id'])){
            $titulo = 'Editar Usuário';
            $titulo_button = 'Editar';
            $url_post = '&acao=editar&id='.$_GET['id'];
            $usuario = $this->banco->select("SELECT * FROM usuarios WHERE id_usuarios = ?",[$_GET['id']],false);
        }

        $this->view('adm/FormUsuario.php',[
            'usuario' => $usuario,
            'tipo_usuario' => $tipo_usuario,
            'titulo' => $titulo,
            'titulo_button' => $titulo_button,
            'url_post' => $url_post
        ]);
    }
}