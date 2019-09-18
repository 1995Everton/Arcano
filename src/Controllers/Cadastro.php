<?php


namespace Arcanos\Enigmas\Controllers;


class Cadastro extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        $this->view('Cadastro.php',[]);
    }
}