<?php
use Arcanos\Enigmas\Controllers\Login;
use Arcanos\Enigmas\Controllers\Home;

class Routes
{
    public static function getRoutes()
    {
        return [
            'login' => Login::class,
            'home' => Home::class
        ];
    }
}