<?php

use Arcanos\Enigmas\Controllers\Autenticar;
use Arcanos\Enigmas\Controllers\Enigmas\EnigmaFase;
use Arcanos\Enigmas\Controllers\Enigmas\EnigmaHome;
use Arcanos\Enigmas\Controllers\Login;
use Arcanos\Enigmas\Controllers\Cadastro;
use Arcanos\Enigmas\Controllers\Home;
use Arcanos\Enigmas\Controllers\Perfil;
use Arcanos\Enigmas\Controllers\PersistenciaUsuario;
use Arcanos\Enigmas\Controllers\Ranking;
use Arcanos\Enigmas\Controllers\CadastroEnigma;
use Arcanos\Enigmas\Controllers\PersistenciaEnigma;
use Arcanos\Enigmas\Controllers\Adm\Adm;
use Arcanos\Enigmas\Controllers\Adm\Enigma_visu;
use Arcanos\Enigmas\Controllers\Adm\Titulo_visu;

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
            'enigma-fase' => EnigmaFase::class,
            'perfil' => Perfil::class,
            'ranking' => Ranking::class,
            'enigma-cadastro' => CadastroEnigma::class,
            'enigma-persistencia' => PersistenciaEnigma::class,
            'adm' => Adm::class,
            'enigma-visu' => Enigma_visu::class,
            'titulo-visu' => Titulo_visu::class

        ];
    }
}