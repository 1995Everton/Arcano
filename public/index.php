<?php


require_once __DIR__ . "/../vendor/autoload.php";

session_start();
$classeControlador = (new InterceptorRequest())->service();
$controlador = new $classeControlador();
$controlador->handle();