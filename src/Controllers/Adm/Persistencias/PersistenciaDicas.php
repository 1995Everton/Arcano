<?php


namespace Arcanos\Enigmas\Controllers\Adm\Persistencias;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator as v;

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
        try {
            $this->getRegras()->assert($_POST);
            return [
                'dicas_enigmas_id' => $_POST['dicas_enigmas_id'],
                'dica' => $_POST['Dica'],
                'dicas_tipos_id' => $_POST['dicas_tipos_id'],
                'categoria_dicas_id' => $_POST['categoria_dicas_id']
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
    public function getRegras()
    {
        return v::key('Dica', v::stringType()->notEmpty()->noWhitespace()->length(3, 32))
            ->key('dicas_enigmas_id',v::numeric()->notEmpty())
            ->key('dicas_tipos_id',v::numeric()->notEmpty())
            ->key('categoria_dicas_id',v::numeric()->notEmpty());
    }

    public function getTraducao()
    {
       return [
           'notEmpty' => 'O Campo {{name}} nao pode estar em branco',
           'length' => 'O Campo {{name}} deve conter entre 3 a 32 caracteres',
           'noWhitespace' => 'O Campo {{name}}não pode ter espações em branco',
           'numeric' => 'O Campo {{name}} deve ser um tipo numerico'
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