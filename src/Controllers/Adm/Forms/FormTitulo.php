<?php


namespace Arcanos\Enigmas\Controllers\Adm\Forms;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class FormTitulo extends Banco implements RequestHandlerInterface
{

    public function handle()
    {
        $this->view("adm/FormTitulo.php",[]);
    }
}