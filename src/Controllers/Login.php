<?php


namespace Arcanos\Enigmas\Controllers;


use Arcanos\Enigmas\Helpers\segurityCrypt;

class Login extends Banco implements RequestHandlerInterface
{
    use segurityCrypt;
    public function handle()
    {
        $this->view('login.php',[]);
    }
}