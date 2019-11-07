<?php


namespace Arcanos\Enigmas\Controllers\Adm\Persistencias;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

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
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senha_repita = $_POST['senha_repita'];
        $tipo_usuario = $_POST['tipo_usuario'];
        $url_foto = $_POST['url_foto'];
        return [
            'nome_usuario' => $nome,
            'email' => $email,
            'senha' => $this->criptografar($senha),
            'categoria_usuarios_id' => $tipo_usuario,
            'url_foto' => $url_foto
        ];
    }
    public function novo()
    {
        $this->banco->insert($this->TABELA,$this->validarPost());
        $this->toast("Usuarios Criado Com Sucesso!","Aviso","success");
        header($this->SUCCESS_REDIRECT);
    }
    public function editar()
    {
        $this->banco->update($this->TABELA,$this->validarPost(),$this->getID());
        $this->toast("Usuarios Atualizado Com Sucesso!","Aviso","success");
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
}