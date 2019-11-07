<?php


namespace Arcanos\Enigmas\Controllers\Adm\Persistencias;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class PersistenciaDicas extends Banco implements  RequestHandlerInterface,PersistenceInterface
{

    private $TABELA = "dicas";
    private $SUCCESS_REDIRECT = "Location: index.php?pagina=tabela-dica";
    private $ERROR_REDIRECT = "Location: index.php?pagina=form-dicas";

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
                header($this->ERROR_REDIRECT);
                break;
        }
    }
    public function validarPost()
    {
        $dicas_enigmas_id = $_POST['dicas_enigmas_id'];
        $dica = $_POST['dica'];
        $dicas_tipos_id = $_POST['dicas_tipos_id'];
        $categoria_dicas_id = $_POST['categoria_dicas_id'];
        return [
            'dicas_enigmas_id' => $dicas_enigmas_id,
            'dica' => $dica,
            'dicas_tipos_id' => $dicas_tipos_id,
            'categoria_dicas_id' => $categoria_dicas_id,
        ];
    }
    public function novo()
    {
        $this->banco->insert($this->TABELA,$this->validarPost());
        $this->toast("Dica Criado Com Sucesso!","Aviso","success");
        header($this->SUCCESS_REDIRECT);
    }
    public function editar()
    {
        $this->banco->update($this->TABELA,$this->validarPost(),$this->getID());
        $this->toast("Dica Atualizado Com Sucesso!","Aviso","success");
        header($this->SUCCESS_REDIRECT);
    }
    public function deletar()
    {
        $query =  $this->banco->delete($this->TABELA,$this->getID());
        $this->deleteStatus($query);
    }

    public function getID()
    {
        return ['id_dicas' => $_GET['id']];
    }
}