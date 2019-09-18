<?php
/**
 * Created by PhpStorm.
 * User: alisson_cleverson
 * Date: 17/09/2019
 * Time: 20:54
 */

namespace Arcanos\Enigmas\Models;


class Enigma extends Conexao
{
    public function buscarEnigmas()
    {
        $query = mysqli_query($this->conexao, "SELECT * FROM enigmas");
        $lista = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $lista;
    }

    public function cadastrarEnigmas($dificuldade,$tipo,$enigma,$data,$resposta)
    {
        $query = mysqli_query($this->conexao, "INSERT INTO enigmas (dificuldade_enigma_id, enigmas_tipos_id, enigma, data, resposta) VALUES ($dificuldade,$tipo,'$enigma','$data','$resposta')");
        if($query) return true;
        return false;
    }
}