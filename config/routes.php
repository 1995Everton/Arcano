<?php

use Arcanos\Enigmas\Controllers\Adm\CadastroDicas;
use Arcanos\Enigmas\Controllers\Adm\CadastroEnigma;
use Arcanos\Enigmas\Controllers\Adm\CadastroTitulo;
use Arcanos\Enigmas\Controllers\Adm\CadastroUsuario;
use Arcanos\Enigmas\Controllers\Adm\FormUsuario;
use Arcanos\Enigmas\Controllers\Adm\PersistenciaEnigma;
use Arcanos\Enigmas\Controllers\Adm\PersistenciaTitulo;
use Arcanos\Enigmas\Controllers\Adm\PersistenciaUsuario;
use Arcanos\Enigmas\Controllers\Enigmas\EnigmaFase;
use Arcanos\Enigmas\Controllers\Enigmas\EnigmaHome;
use Arcanos\Enigmas\Controllers\Autenticar;
use Arcanos\Enigmas\Controllers\Login;
use Arcanos\Enigmas\Controllers\Cadastro;
use Arcanos\Enigmas\Controllers\Home;
use Arcanos\Enigmas\Controllers\Perfil;
use Arcanos\Enigmas\Controllers\NovoUsuario;
use Arcanos\Enigmas\Controllers\Ranking;


class Routes
{
    public static function getRoutes()
    {
        return [
            'login' => Login::class,
            'cadastro' => Cadastro::class,
            'home' => Home::class,
            'autenticar' => Autenticar::class,
            'novo-usuario' => NovoUsuario::class,
            'enigma-home' => EnigmaHome::class,
            'enigma-fase' => EnigmaFase::class,
            'perfil' => Perfil::class,
            'ranking' => Ranking::class,
            'cadastro-enigma' => CadastroEnigma::class,
            'cadastro-usuario' => CadastroUsuario::class,
            'cadastro-titulo' => CadastroTitulo::class,
            'cadastro-dica' => CadastroDicas::class,
            'enigma-persistencia' => PersistenciaEnigma::class,
            'usuario-persistencia' => PersistenciaUsuario::class,
            'form-usuario' => FormUsuario::class,
            'persistenciatitulo' => PersistenciaTitulo::class,
        ];
    }
}