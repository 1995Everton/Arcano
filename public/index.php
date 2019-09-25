<?php


require_once __DIR__ . "/../vendor/autoload.php";

session_start();
$caminho = isset($_GET['pagina']) ? $_GET['pagina'] : 'home';
$routes = Routes::getRoutes();

if(!array_key_exists($caminho,$routes)){
    http_response_code(404);
    exit();
}
$classeControlador = $routes[$caminho];
$controlador = new $classeControlador();
$controlador->handle();