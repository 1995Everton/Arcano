<?php
/**
 * Created by PhpStorm.
 * User: everton_p_cardoso
 * Date: 23/09/2019
 * Time: 20:48
 */

namespace Arcanos\Enigmas\Controllers\Adm;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class Titulo_visu extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        $this->view('adm\Titulo_visu.php',[]);
    }

}