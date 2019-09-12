<?php
use Arcanos\Enigmas\Controllers\Login;

class Routes
{
    public static function getRoutes()
    {
        return [
            'login' => Login::class
        ];
    }
}