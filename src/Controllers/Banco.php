<?php
/**
 * Created by PhpStorm.
 * User: everton_p_cardoso
 * Date: 10/09/2019
 * Time: 19:46
 */

namespace Arcanos\Enigmas\Controllers;




use Arcanos\Enigmas\Helpers\renderHTML;
use Arcanos\Enigmas\Models\Usuario;

class Banco
{
    use renderHTML;
    public function __construct()
    {
        $this->usuarios = new Usuario();
    }
}