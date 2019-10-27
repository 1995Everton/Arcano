<?php
/**
 * Created by PhpStorm.
 * User: everton_p_cardoso
 * Date: 23/09/2019
 * Time: 20:48
 */

namespace Arcanos\Enigmas\Controllers\Adm\Tabelas;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class TabelaTitulo extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        $titulos = $this->banco->select("SELECT * FROM titulo",[],true);
        $this->view('adm\TabelaTitulo.php',[
            'titulos' => $titulos,
            'modal' => $this->getCallbackModal()
        ]);
    }

}