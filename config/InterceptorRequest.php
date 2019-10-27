<?php


class InterceptorRequest
{
    public function service()
    {
        $routes = Routes::getRoutes();
        $caminho = isset($_GET['pagina']) ? $_GET['pagina'] : 'home';
        if(!isset($_SESSION['nome_usuario']) && !isset($_SESSION['id_usuarios']) && $caminho != 'login' && $caminho != 'autenticar' && $caminho != 'cadastro' && $caminho != 'persistenciausuario' ){
            return header('Location: index.php?pagina=login');
        }else if(isset($_SESSION['nome_usuario']) && isset($_SESSION['id_usuarios']) && $caminho == 'login'){
            return header('Location: index.php?pagina=enigma-home');
        }

        if(!array_key_exists($caminho,$routes)){
            $caminho = 'not-found';
        }
        return $routes[$caminho];
    }
}