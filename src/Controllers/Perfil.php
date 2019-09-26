<?php


namespace Arcanos\Enigmas\Controllers;


class Perfil extends Banco implements RequestHandlerInterface
{

    public function handle()
    {


        $id_usuarios = $_SESSION['id_usuarios'];
        $busca = $this->banco->select("SELECT usuarios.id_usuarios, usuarios_titulo.titulo_id, titulo.ds_titulo, pontuacao.progresso 
                                            FROM usuarios 
                                            INNER JOIN usuarios_titulo 
                                            ON usuarios_titulo.usuarios_id = usuarios.id_usuarios
                                            INNER JOIN titulo
                                            ON titulo.id_titulo = usuarios_titulo.titulo_id
                                            INNER JOIN pontuacao
                                            ON pontuacao.usuarios_pontuacao_id = usuarios.id_usuarios
                                            WHERE id_usuarios = ?", [$id_usuarios], false);

        $_SESSION['pontuacao_usuario'] = $busca['progresso'];
        $_SESSION['titulo_usuario'] = $busca['ds_titulo'];
        $this->view('Perfil.php',[]);
    }
}