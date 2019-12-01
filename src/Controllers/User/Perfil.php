<?php


namespace Arcanos\Enigmas\Controllers\User;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;
use Arcanos\Enigmas\Models\Usuario;

class Perfil extends Banco implements RequestHandlerInterface
{

    public function handle()
    {
        $this->view('Perfil.php',[
            'usuario' => Usuario::getUser(),
            'titulo' => Usuario::getTitle(),
            'tentativas' => Usuario::getAttempts(),
            'total_pontos' =>  Usuario::getPoints()
        ]);
    }
}