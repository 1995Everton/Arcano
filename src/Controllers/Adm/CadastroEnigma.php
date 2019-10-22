<?php


namespace Arcanos\Enigmas\Controllers\Adm;

use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class CadastroEnigma extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        /* Pesquisa de categoria DICA no banco de dados */
        $ds_categoria = $this->banco->select("SELECT * FROM categorias");
        /* Pesquisa do tipo do enigma para cadastro */
        $ds_tipos = $this->banco->select("SELECT * FROM tipos");
        $this->view('adm/CadastroEnigma.php',[
            'ds_categoria' => $ds_categoria,
            'ds_tipos' => $ds_tipos
        ]);
    }
}