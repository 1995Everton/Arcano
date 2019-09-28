<?php
/**
 * Created by PhpStorm.
 * User: everton_p_cardoso
 * Date: 10/09/2019
 * Time: 19:46
 */

namespace Arcanos\Enigmas\Controllers;




use Arcanos\Enigmas\Helpers\renderHTML;
use Arcanos\Enigmas\Helpers\renderToast;
use Arcanos\Enigmas\Helpers\segurityCrypt;
use Arcanos\Enigmas\Models\Crud;

abstract class Banco
{
    use renderHTML,segurityCrypt,renderToast;
    protected $banco;

    public function __construct()
    {
        $this->banco = new Crud();
    }

}