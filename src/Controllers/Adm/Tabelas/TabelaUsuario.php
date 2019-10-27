<?php
/**
 * Created by PhpStorm.
 * User: everton_p_cardoso
 * Date: 23/09/2019
 * Time: 20:48
 */

namespace Arcanos\Enigmas\Controllers\Adm\Tabelas;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class TabelaUsuario extends Banco implements RequestHandlerInterface
{

    public function handle()
    {

        $usuarios = $this->banco->select("SELECT id_usuarios , nome_usuario , email , url_foto FROM usuarios",[],true);
        $this->view('adm\TabelaUsuario.php',[
            'usuarios' => $usuarios,
            'modal' => $this->getCallbackModal()
        ]);

    }

}