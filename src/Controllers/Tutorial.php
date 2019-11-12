<?php


namespace Arcanos\Enigmas\Controllers;


class Login extends Banco implements RequestHandlerInterface
{

    public function handle()
    {
        $this->view('Tutorial.php',[]);
    }
}