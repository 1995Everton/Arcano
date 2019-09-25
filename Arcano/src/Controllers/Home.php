<?php


namespace Arcanos\Enigmas\Controllers;


class Home extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        $this->view('Home.php',[]);
    }
}