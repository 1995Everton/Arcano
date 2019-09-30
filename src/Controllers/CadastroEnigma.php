<?php


namespace Arcanos\Enigmas\Controllers;


class CadastroEnigma extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        $this->view('CadastroEnigma.php',[]);
    }
}