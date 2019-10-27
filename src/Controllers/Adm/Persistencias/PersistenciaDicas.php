<?php


namespace Arcanos\Enigmas\Controllers\Adm\Persistencias;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class PersistenciaDicas extends Banco implements  RequestHandlerInterface
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
                header('Location: index.php?pagina=form-dicas');
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