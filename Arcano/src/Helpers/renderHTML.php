<?php
/**
 * Created by PhpStorm.
 * User: everton_p_cardoso
 * Date: 10/09/2019
 * Time: 19:25
 */

namespace Arcanos\Enigmas\Helpers;


trait renderHTML
{
    public function view($caminho,$dados = [])
    {
        extract($dados);
        include __DIR__."/../../view/header.php";
        include __DIR__."/../../view/pages/".$caminho;
        include __DIR__."/../../view/footer.php";
    }
}