<?php


namespace Arcanos\Enigmas\Controllers;


use Arcanos\Enigmas\Models\Enigma;

class Login extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        $this->view('login.php',[]);
    }
}