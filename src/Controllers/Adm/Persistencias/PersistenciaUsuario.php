<?php


namespace Arcanos\Enigmas\Controllers\Adm\Persistencias;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator as v;

class PersistenciaUsuario extends Banco implements RequestHandlerInterface,PersistenceInterface
{
    private $TABELA = "Usuarios";
    private $SUCCESS_REDIRECT = "Location: index.php?pagina=tabela-usuario";
    private $ERROR_REDIRECT = "Location: index.php?pagina=form-usuario";

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
                'nome_usuario' => $_POST['Nome'],
                'email' => $_POST['email'],
                'senha' => $this->criptografar($_POST['Senha']),
                'categoria_usuarios_id' => $_POST['tipo_usuario'],
                'url_foto' => $_POST['Foto']
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
        $this->toast("Usuario Criado Com Sucesso!","Aviso","success");
        header($this->SUCCESS_REDIRECT);
    }
    public function editar()
    {
        $this->banco->update($this->TABELA,$this->validarPost(),$this->getID());
        $this->toast("Usuario Atualizado Com Sucesso!","Aviso","success");
        header($this->SUCCESS_REDIRECT);
    }
    public function deletar()
    {
        $query =  $this->banco->delete($this->TABELA,$this->getID());
        $this->deleteStatus($query);
    }

    public function getID()
    {
        return ['id_usuarios' => $_GET['id']];
    }
    public function getRegras()
    {
        return v::key('Nome', v::stringType()->notEmpty()->length(3, 32))
            ->key('email', v::email()->notEmpty())
            ->key('Senha',  v::stringType()->notEmpty()->length(3, 32)->equals($_POST['senha_repita']))
            ->key('Foto', v::notEmpty()->url());
    }
    public function getTraducao()
    {
        return [
            'notEmpty' => 'O Campo {{name}} nao pode estar em branco',
            'length' => 'O Campo {{name}} deve conter entre 3 a 32 caracteres',
            'equals'=> 'As Senhas devem ser iguais',
            'url' => 'O Campo {{name}} deve ser uma url valida',
            'email' => 'Você deve informar um E-Mail Valido'
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