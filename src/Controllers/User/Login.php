<?php


namespace Arcanos\Enigmas\Controllers\User;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class Login extends Banco implements RequestHandlerInterface
{

    public function handle()
    {
        $this->view('Login.php',[]);
    }
}