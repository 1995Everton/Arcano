<?php

use Arcanos\Enigmas\Controllers\Autenticar;
use Arcanos\Enigmas\Controllers\Enigmas\EnigmaHome;
use Arcanos\Enigmas\Controllers\Login;
use Arcanos\Enigmas\Controllers\Cadastro;
use Arcanos\Enigmas\Controllers\Home;
use Arcanos\Enigmas\Controllers\Perfil;
use Arcanos\Enigmas\Controllers\PersistenciaUsuario;
use Arcanos\Enigmas\Controllers\Ranking;


class Routes
{
    public static function getRoutes()
    {
        return [
            'login' => Login::class,
            'cadastro' => Cadastro::class,
            'home' => Home::class,
            'enigma-home' => EnigmaHome::class,
            'autenticar' => Autenticar::class,
            'persistenciausuario' => PersistenciaUsuario::class,
            'enigma-home' => EnigmaHome::class,
            'perfil' => Perfil::class,
            'ranking' => Ranking::class
        ];
    }
}