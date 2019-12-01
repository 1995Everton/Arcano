<?php


namespace Arcanos\Enigmas\Controllers\User;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class Perfil extends Banco implements RequestHandlerInterface
{

    public function handle()
    {


        $id_usuarios = $_SESSION['id_usuarios'];
        $usuario = $this->banco->select("
            SELECT usuarios.nome_usuario , usuarios.email , usuarios.url_foto
            FROM usuarios 
            WHERE id_usuarios = ?", [$id_usuarios], false
        );
        $titulo = $this->banco->select("SELECT titulo.ds_titulo 
            FROM usuarios_titulo 
            INNER JOIN usuarios
            ON usuarios.id_usuarios = usuarios_titulo.usuarios_id
            INNER JOIN titulo
            ON titulo.id_titulo = usuarios_titulo.titulo_id
            WHERE usuarios.id_usuarios = ?" ,[$id_usuarios], false
        );
        $tentativas = $this->banco->select("
            SELECT COUNT(*) as tentativas
            FROM pontuacao 
            WHERE pontuacao.usuarios_pontuacao_id = ?",[$id_usuarios], false
        );
        $total_pontos = $this->banco->select("
            SELECT SUM(pontuacao.pontos) as pontos
            FROM pontuacao 
            WHERE pontuacao.usuarios_pontuacao_id = ? ",[$id_usuarios], false);

        $this->view('Perfil.php',[
            'usuario' => $usuario,
            'titulo' => $titulo,
            'tentativas' => $tentativas,
            'total_pontos' =>  $total_pontos
        ]);
    }
}