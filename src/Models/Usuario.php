<?php


namespace Arcanos\Enigmas\Models;


class Usuario
{
    public static function getUser()
    {
        return  (new Crud())->select("
            SELECT usuarios.nome_usuario , usuarios.email , usuarios.url_foto
            FROM usuarios 
            WHERE id_usuarios = ?", [$_SESSION['id_usuarios']], false
        );
    }
    public static function getPoints()
    {
       $pontos =  (new Crud())->select("
            SELECT SUM(pontuacao.pontos) as pontos
            FROM pontuacao 
            WHERE pontuacao.usuarios_pontuacao_id = ? ",[$_SESSION['id_usuarios']], false
       );
       return $pontos['pontos'];

    }
    public static function getAttempts()
    {
        $tentativas =  (new Crud())->select("
            SELECT COUNT(*) as tentativas
            FROM pontuacao 
            WHERE pontuacao.usuarios_pontuacao_id = ?",[$_SESSION['id_usuarios']], false
        );
        return $tentativas['tentativas'];
    }
    public static function getTitle()
    {
        return  (new Crud())->select("SELECT titulo.ds_titulo , titulo.id_titulo
            FROM usuarios_titulo 
            INNER JOIN usuarios
            ON usuarios.id_usuarios = usuarios_titulo.usuarios_id
            INNER JOIN titulo
            ON titulo.id_titulo = usuarios_titulo.titulo_id
            WHERE usuarios.id_usuarios = ?" ,[$_SESSION['id_usuarios']], true
        );
    }

    public static function getUserFirst()
    {
        $id_first =   (new Crud())->select("
            SELECT usuarios.id_usuarios
            FROM usuarios
            INNER JOIN pontuacao
            on pontuacao.usuarios_pontuacao_id = usuarios.id_usuarios
            INNER JOIN enigmas
            ON enigmas.id_enigmas = pontuacao.enigmas_pontuacao_id
            order by pontuacao.pontos desc
            LIMIT 1",[],false
        );
        return $_SESSION['id_usuarios'] == $id_first['id_usuarios'];
    }

}