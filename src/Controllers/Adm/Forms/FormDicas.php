<?php


namespace Arcanos\Enigmas\Controllers\Adm\Forms;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class FormDicas extends Banco implements RequestHandlerInterface
{

    public function handle()
    {
        $config = [
            'enigmas' => $this->banco->select("SELECT id_enigmas , enigma FROM enigmas"),
            'tipos' => $this->banco->select("SELECT * FROM tipos"),
            'categorias' => $this->banco->select("SELECT * FROM categorias"),
            'titulo' => 'Cadastrar Dica',
            'titulo_button' => 'Cadastrar',
            'acao' => 'novo',
            'dica' => [
                'categoria_dicas_id' => 0,
                'dicas_enigmas_id' => 0,
                'dicas_tipos_id' => 0,
                'dica' => '',
            ]
        ];
        if(isset($_GET['id'])):
            $config['titulo'] = 'Editar Dica';
            $config['titulo_button'] = 'Editar';
            $config['acao'] = "editar&id=$_GET[id]";
            $config['dica'] = $this->banco->select("SELECT * FROM dicas WHERE id_dicas = ?",[$_GET['id']],false);
        endif;
        $this->view("adm/FormDicas.php",[
            'config' => $config
        ]);
    }
}