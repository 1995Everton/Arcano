<?php


class InterceptorRequest
{
    private $PERMISSAO = [
        'Administrador' => [
            'tabela-enigma',
            'tabela-usuario',
            'tabela-titulo',
            'tabela-dica',
            'persistencia-enigma',
            'persistencia-usuario',
            'persistencia-titulo',
            'persistencia-dicas',
            'form-enigma',
            'form-usuario',
            'form-titulo',
            'form-dicas',
            'home',
            'autenticar',
            'tutorial'
        ],
        'Usuário' => [
            'enigma-home',
            'enigma-fase',
            'perfil',
            'ranking',
            'home',
            'autenticar',
            'tutorial'
        ],
       'Visitante' => [
            'login',
            'cadastro',
            'novo-usuario',
            'not-found',
            'home',
            'autenticar'
        ]
    ];
    public function service()
    {
        $routes = Routes::getRoutes();
        $caminho = isset($_GET['pagina']) ? $_GET['pagina'] : 'home';
        if(!array_key_exists($caminho,$routes)){
            $caminho = 'not-found';
        }else{
            if($this->permission($caminho) == false){
                $caminho = 'not-authorized';
            }
        }
        return $routes[$caminho];
    }

   private function permission($caminho)
    {
        $tipo_usuario = isset($_SESSION['tipo_usuario']) ? $_SESSION['tipo_usuario'] : 'Visitante';
        return in_array($caminho,$this->PERMISSAO[$tipo_usuario]);
    }
}