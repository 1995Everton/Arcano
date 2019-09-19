<?php
/**
 * Created by PhpStorm.
 * User: everton_p_cardoso
 * Date: 17/09/2019
 * Time: 20:15
 */

namespace Arcanos\Enigmas\Models;


use Arcanos\Enigmas\Helpers\segurityCrypt;

class Usuario extends Conexao
{
    use segurityCrypt;
    public function buscarUsuarios()
    {
        $query = mysqli_query($this->conexao,"SELECT * FROM usuarios");
        $lista = mysqli_fetch_all($query,MYSQLI_ASSOC);
        return $lista;
    }

    public function cadastrarUsuario($nome_usuario,$categoria_usuarios_id,$email,$senha)
    {
        $senhaCriptogravada = $this->criptografar($senha);
        $query = mysqli_query($this->conexao,"INSERT INTO usuarios (nome_usuario,categoria_usuarios_id,email,senha) VALUES ('$nome_usuario',$categoria_usuarios_id,'$email','$senhaCriptogravada')");
        var_dump($query);
        if($query) return true;
        return false;
    }

}