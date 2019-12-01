<?php

namespace Arcanos\Enigmas\Controllers\Adm\Persistencias;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator as v;

class PersistenciaTitulo extends Banco implements RequestHandlerInterface,PersistenceInterface
{
    private $TABELA = "titulo";
    private $SUCCESS_REDIRECT = "Location: index.php?pagina=tabela-titulo";
    private $ERROR_REDIRECT = "Location: index.php?pagina=form-titulo";

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
        try {
            $this->getRegras()->assert($_POST);
            return [
                'ds_titulo' => $_POST['Titulo'],
                'id_regra_titulo' => $_POST['id_regra_titulo'],
                'quantidade' => $_POST['Quantidade']
            ];
        } catch (ValidationException $e) {
            $errors = array_filter($e->findMessages($this->getTraducao()));
            $this->allToast($errors);
            header($this->urlConfigError());
            exit();
        }
    }

    public function novo()
    {
        $this->banco->insert($this->TABELA,$this->validarPost());
        $this->toast("Titulo Criado Com Sucesso!","Aviso","success");
        header($this->SUCCESS_REDIRECT);
    }
    public function editar()
    {
        $this->banco->update($this->TABELA,$this->validarPost(),$this->getID());
        $this->toast("Titulo Atualizado Com Sucesso!","Aviso","success");
        header($this->SUCCESS_REDIRECT);
    }
    public function deletar()
    {
        $query =  $this->banco->delete($this->TABELA,$this->getID());
        $this->deleteStatus($query);
    }

    public function getID()
    {
        return ['id_titulo' => $_GET['id']];
    }
    public function getRegras()
    {
        return v::key('Titulo', v::notEmpty()->length(3, 32))
            ->key('Quantidade', v::numeric()->notEmpty()  );
    }

    public function getTraducao()
    {
        return [
            'notEmpty' => 'O Campo {{name}} nao pode estar em branco',
            'length' => 'O Campo {{name}} deve conter entre 3 a 32 caracteres',
            'numeric' =>  'O Campo {{name}} deve ser uma numero'
        ];
    }

    public function urlConfigError()
    {
        if(isset($_GET['id'])){
            return $this->ERROR_REDIRECT."&id=".$_GET['id'];
        }else{
            return $this->ERROR_REDIRECT;
        }
    }
}