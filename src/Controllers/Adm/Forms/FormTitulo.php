<?php


namespace Arcanos\Enigmas\Controllers\Adm\Forms;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class FormTitulo extends Banco implements RequestHandlerInterface
{

    public function handle()
    {
        $config = [
            'titulo' => 'Cadastrar Titulo',
            'titulo_button' => 'Cadastrar',
            'acao' => 'novo',
            'titulos' => [
                'id_titulo' => 0,
                'ds_titulo' => ''
            ]
        ];
        if(isset($_GET['id'])):
            $config['titulo'] = 'Editar Titulo';
            $config['titulo_button'] = 'Editar';
            $config['acao'] = "editar&id=$_GET[id]";
            $config['titulos'] = $this->banco->select("SELECT * FROM titulo WHERE id_titulo = ?",[$_GET['id']],false);
        endif;
        $this->view("adm/FormTitulo.php",[
            'config'=> $config
        ]);
    }
}