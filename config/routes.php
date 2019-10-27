<?php


use Arcanos\Enigmas\Controllers\Adm\Forms\FormDicas;
use Arcanos\Enigmas\Controllers\Adm\Forms\FormEnigma;
use Arcanos\Enigmas\Controllers\Adm\Forms\FormTitulo;
use Arcanos\Enigmas\Controllers\Adm\Forms\FormUsuario;
use Arcanos\Enigmas\Controllers\Adm\Persistencias\PersistenciaDicas;
use Arcanos\Enigmas\Controllers\Adm\Persistencias\PersistenciaEnigma;
use Arcanos\Enigmas\Controllers\Adm\Persistencias\PersistenciaTitulo;
use Arcanos\Enigmas\Controllers\Adm\Persistencias\PersistenciaUsuario;
use Arcanos\Enigmas\Controllers\Adm\Tabelas\TabelaDicas;
use Arcanos\Enigmas\Controllers\Adm\Tabelas\TabelaEnigma;
use Arcanos\Enigmas\Controllers\Adm\Tabelas\TabelaTitulo;
use Arcanos\Enigmas\Controllers\Adm\Tabelas\TabelaUsuario;
use Arcanos\Enigmas\Controllers\Enigmas\EnigmaFase;
use Arcanos\Enigmas\Controllers\Enigmas\EnigmaHome;
use Arcanos\Enigmas\Controllers\Autenticar;
use Arcanos\Enigmas\Controllers\Login;
use Arcanos\Enigmas\Controllers\Cadastro;
use Arcanos\Enigmas\Controllers\Home;
use Arcanos\Enigmas\Controllers\NotFound;
use Arcanos\Enigmas\Controllers\Perfil;
use Arcanos\Enigmas\Controllers\NovoUsuario;
use Arcanos\Enigmas\Controllers\Ranking;


class Routes
{
    public static function getRoutes()
    {
        return array(
            'login' => Login::class,
            'cadastro' => Cadastro::class,
            'home' => Home::class,
            'autenticar' => Autenticar::class,
            'novo-usuario' => NovoUsuario::class,
            'enigma-home' => EnigmaHome::class,
            'enigma-fase' => EnigmaFase::class,
            'perfil' => Perfil::class,
            'ranking' => Ranking::class,
            'not-found' => NotFound::class,
            'tabela-enigma' => TabelaEnigma::class,
            'tabela-usuario' => TabelaUsuario::class,
            'tabela-titulo' => TabelaTitulo::class,
            'tabela-dica' => TabelaDicas::class,
            'persistencia-enigma' => PersistenciaEnigma::class,
            'persistencia-usuario' => PersistenciaUsuario::class,
            'persistencia-titulo' => PersistenciaTitulo::class,
            'persistencia-dicas' => PersistenciaDicas::class,
            'form-enigma' => FormEnigma::class,
            'form-usuario' => FormUsuario::class,
            'form-titulo' => FormTitulo::class,
            'form-dicas' => FormDicas::class
        );
    }
}