<?php


namespace Arcanos\Enigmas\Helpers;


trait renderToast
{
    public function toast($mensagem,$cabecalho,$cor)
    {
        $_SESSION['toast-mensagem'] = $mensagem;
        $_SESSION['toast-header'] = $cabecalho;
        $_SESSION['toast-color'] = $cor;
    }
}