<?php


namespace Arcanos\Enigmas\Controllers\Enigmas;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class EnigmaHome extends Banco implements RequestHandlerInterface
{

    public function handle()
    {
        $this->view('Enigma.php');
    }
}