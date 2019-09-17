<?php
/**
 * Created by PhpStorm.
 * User: everton_p_cardoso
 * Date: 17/09/2019
 * Time: 20:14
 */

namespace Arcanos\Enigmas\Models;


class Conexao
{
   public $conexao;

    public function __construct()
    {
        $this->conexao = mysqli_connect("localhost","root","root","arcano") or die("Falha na Conexão");
    }

    public function aumentarPenis()
    {

    }
}