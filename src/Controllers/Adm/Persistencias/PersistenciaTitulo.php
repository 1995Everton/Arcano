<?php

namespace Arcanos\Enigmas\Controllers\Adm\Persistencias;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class PersistenciaTitulo extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        $titulo = $_POST['titulo'];

        $dados = $this->banco->select("SELECT * FROM titulo WHERE ds_titulo = ? ", [$titulo], true);

        if ($dados) {
            foreach ($dados as $key => $value) {
                if ($value['ds_titulo'] == $titulo) {
                    $this->toast('Título já cadastrado', 'ERRO', 'danger');
                    header("Location: index.php?pagina=cadastro-titulo");

                }
            }
        } else {
            $this->banco->insert('titulo',
                [
                    'ds_titulo' => $titulo,
                ]
            );
            $this->toast('Cadastro de título realizado com susseso', '', 'success');
            header("Location: index.php?pagina=cadastro-titulo");
        }
    }
}