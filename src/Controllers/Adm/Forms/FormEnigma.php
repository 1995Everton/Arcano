<?php


namespace Arcanos\Enigmas\Controllers\Adm\Forms;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class FormEnigma extends Banco implements RequestHandlerInterface
{

    public function handle()
    {
        /* Pesquisa de categoria DICA no banco de dados */
        $ds_categoria = $this->banco->select("SELECT * FROM categorias");
        /* Pesquisa do tipo do enigma para cadastro */
        $ds_tipos = $this->banco->select("SELECT * FROM tipos");
        /* Pesquisa do enigma */
        $ds_enigma = $this->banco->select("SELECT * FROM enigmas WHERE id_enigmas =" . $retVal = (isset($_GET['id'])) ? $_GET['id'] : null);


        $this->view('adm/FormEnigma.php', [
            'ds_categoria' => $ds_categoria,
            'ds_tipos' => $ds_tipos,
            'ds_enigma' => $ds_enigma
        ]);
    }
}
