<?php


namespace Arcanos\Enigmas\Controllers;


class Tutorial extends Banco implements RequestHandlerInterface
{

    public function handle()
    {
        $this->view('Tutorial.php',[]);
    }
}