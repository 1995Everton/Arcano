<?php


require_once __DIR__ . "/../vendor/autoload.php";

session_start();
$caminho = isset($_GET['pagina']) ? $_GET['pagina'] : 'home';
$routes = Routes::getRoutes();

if(!isset($_SESSION['nome_usuario']) && !isset($_SESSION['id_usuarios']) && $caminho != 'login' && $caminho != 'autenticar' && $caminho != 'cadastro' && $caminho != 'persistenciausuario' ){
    return header('Location: index.php?pagina=login');
}else if(isset($_SESSION['nome_usuario']) && isset($_SESSION['id_usuarios']) && $caminho == 'login'){
    return header('Location: index.php?pagina=enigma-home');
}


if(!array_key_exists($caminho,$routes)){
    http_response_code(404);
    exit();
}
$classeControlador = $routes[$caminho];
$controlador = new $classeControlador();
$controlador->handle();