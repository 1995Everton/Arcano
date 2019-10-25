<?php
/**
 * Created by PhpStorm.
 * User: everton_p_cardoso
 * Date: 23/09/2019
 * Time: 20:48
 */

namespace Arcanos\Enigmas\Controllers\Adm;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class CadastroUsuario extends Banco implements RequestHandlerInterface
{

    public function handle()
    {

        $callbackModal = $this->getCallbackModal();
        $usuarios = $this->banco->select("SELECT id_usuarios , nome_usuario , email , url_foto FROM usuarios",[],true);
        $this->view('adm\CadastroUsuario.php',[
            'usuarios' => $usuarios,
            'modal' => $callbackModal
        ]);

    }

}