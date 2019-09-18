<?php
/**
 * Created by PhpStorm.
 * User: everton_p_cardoso
 * Date: 17/09/2019
 * Time: 20:15
 */

namespace Arcanos\Enigmas\Models;


class Usuario extends Conexao
{
    public function buscarUsuarios()
    {
        $query = mysqli_query($this->conexao,"SELECT * FROM usuarios");
        $lista = mysqli_fetch_all($query,MYSQLI_ASSOC);
        return $lista;
    }
}