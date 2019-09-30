<?php


namespace Arcanos\Enigmas\Controllers;


class PersistenciaEnigma extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        var_dump( $_POST);
    }
}