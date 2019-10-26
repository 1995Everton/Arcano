<?php


namespace Arcanos\Enigmas\Controllers\Adm;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class PersistenciaUsuario extends Banco implements RequestHandlerInterface
{

    public function handle()
    {
        switch ($_GET['acao']){
            case 'novo':
                $this->novo();
                break;
            case 'editar':
                $this->editar();
                break;
            case 'deletar':
                $this->deletar();
                break;
            default:
                header('Location: index.php?pagina=cadastro-usuario');
                break;
        }
    }
    public function novo()
    {
        echo 'novo';
    }
    public function editar()
    {
        echo 'editar';
    }
    public function deletar()
    {
        echo 'deletar';
    }
}