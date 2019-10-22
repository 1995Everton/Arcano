<?php
/**
 * Created by PhpStorm.
 * User: everton_p_cardoso
 * Date: 22/10/2019
 * Time: 20:40
 */

namespace Arcanos\Enigmas\Controllers\Adm;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class CadastroDicas extends Banco implements RequestHandlerInterface
{

    public function handle()
    {
        $this->view("adm/CadastroDicas.php");
    }
}