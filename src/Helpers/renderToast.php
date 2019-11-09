<?php


namespace Arcanos\Enigmas\Helpers;


trait renderToast
{
    public function toast($mensagem,$cabecalho,$cor,$delay = 4000)
    {
        $_SESSION['toast-mensagem'] = $mensagem;
        $_SESSION['toast-header'] = $cabecalho;
        $_SESSION['toast-color'] = $cor;
        $_SESSION['toast-delay'] = $delay;
    }

    public function allToast($itens = [])
    {
        $mensagem = '<ul>';
        foreach ($itens as $key => $item) {
            echo $itens[$key];
            $mensagem .= "<li>".$itens[$key]."</li>";
        }
        $mensagem .= '<ul>';
        $this->toast($mensagem,"Erro","danger",10000);
    }
}