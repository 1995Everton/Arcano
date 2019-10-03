<?php


namespace Arcanos\Enigmas\Controllers;


class Ranking extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        $ranking = $this->banco->select("SELECT usuarios.nome_usuario,pontuacao.pontos,pontuacao.data,pontuacao.progresso
                                            FROM usuarios
                                            INNER JOIN pontuacao
                                            on pontuacao.usuarios_pontuacao_id = usuarios.id_usuarios
                                            INNER JOIN enigmas
                                            ON enigmas.id_enigmas = pontuacao.enigmas_pontuacao_id
                                            order by pontuacao.pontos desc"
        );
        $this->view('Ranking.php',[
            'ranking' => $ranking
        ]);
    }
}