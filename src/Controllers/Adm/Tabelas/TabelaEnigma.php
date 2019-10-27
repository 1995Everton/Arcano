<?php


namespace Arcanos\Enigmas\Controllers\Adm\Tabelas;

use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class TabelaEnigma extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        $enigmas = $this->banco->select("SELECT enigmas.id_enigmas, enigmas.enigma, enigmas.resposta,tipos.ds_tipo,dificuldade_enigmas.ds_dificuldade 
                                                FROM enigmas
                                                INNER JOIN tipos
                                                ON enigmas.enigmas_tipos_id = tipos.id_tipos
                                                INNER JOIN dificuldade_enigmas
                                                ON enigmas.dificuldade_enigma_id = dificuldade_enigmas.id_dificuldade_enigma",[],true);
        $this->view('adm/TabelaEnigma.php',[
            'enigmas' => $enigmas,
            'modal' => $this->getCallbackModal()
        ]);
    }
}