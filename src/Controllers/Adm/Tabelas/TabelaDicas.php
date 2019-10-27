<?php
/**
 * Created by PhpStorm.
 * User: everton_p_cardoso
 * Date: 22/10/2019
 * Time: 20:40
 */

namespace Arcanos\Enigmas\Controllers\Adm\Tabelas;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class TabelaDicas extends Banco implements RequestHandlerInterface
{

    public function handle()
    {
        $dicas = $this->banco->select("SELECT dicas.id_dicas, dicas.dica , enigmas.enigma
                                            FROM dicas
                                            INNER JOIN enigmas
                                            ON enigmas.id_enigmas = dicas.dicas_enigmas_id
                                            ORDER BY dicas.id_dicas",[],true);
        $this->view("adm/TabelaDicas.php",[
            'dicas' => $dicas,
            'modal' => $this->getCallbackModal()
        ]);
    }
}