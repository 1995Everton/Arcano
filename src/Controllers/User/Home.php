<?php


namespace Arcanos\Enigmas\Controllers\User;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class Home extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        $this->view('Home.php',[]);
    }
}