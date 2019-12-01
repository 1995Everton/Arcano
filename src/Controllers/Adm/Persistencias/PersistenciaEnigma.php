<?php


namespace Arcanos\Enigmas\Controllers\Adm\Persistencias;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class PersistenciaEnigma extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        switch ($_GET['acao']) {
            case 'criar':
                $this->novoEnigma();
                break;
            case 'editar':
                $this->editar();
                break;
            case 'deletar':
                $this->deletar();
                break;
            default:
                header("Location: index.php?pagina=tabela-enigma");
                break;
        }
    }

    public function novoEnigma()
    {
        $enigma = null;

        if ($this->validarPost() == true) {
            $this->banco->insert(
                'enigmas',
                [
                    'dificuldade_enigma_id' => $_POST['dificuldade'],
                    'enigmas_tipos_id' => $_POST['tipo'],
                    'enigma' => $enigma = ($_POST['tipo'] == 1) ? $_POST['enigma'] : $this->arquivoUpload($_FILES['arquivo']['tmp_name']),
                    'data' => date('Y-m-d'),
                    'resposta' => $_POST['resposta']
                ]
            );
        }
    }

    public function editar()
    {
        $enigma = null;
        if ($this->validarPost() == true) {
            $this->banco->update(
                'enigmas',
                [
                    'dificuldade_enigma_id' => $_POST['dificuldade'],
                    'enigmas_tipos_id' => $_POST['tipo'],
                    'enigma' =>  $enigma = ($_POST['tipo'] == 1) ? $_POST['enigma'] : $this->arquivoUpload($_FILES['arquivo']['tmp_name']),
                    'data' => date('Y-m-d'),
                    'resposta' => $_POST['resposta']
                ],
                [
                    'id_enigmas' => $_GET['id']
                ]
            );
        }
    }

    public function deletar()
    {
        $query = $this->banco->delete(
            'enigmas',
            [
                'id_enigmas' => $_GET['id']
            ]
        );
        $this->deleteStatus($query);
    }


    public function validarPost()
    {
        $erro = null;

        var_dump($_POST);
        /* Validacao dos campos do formulário */
        if (!isset($_POST['dificuldade']) || (empty($_POST['dificuldade']))) {
            $erro = 'Verifique o campo de Dificuldade';
            echo 'Verifique o campo de Dificuldade';
        } elseif ((!isset($_POST['tipo'])) || (empty($_POST['tipo']))) {
            $erro = 'Verifique o campo Tipo';
            echo 'Verifique o campo Tipo';
        } elseif ((!isset($_POST['resposta'])) || (empty($_POST['resposta']))) {
            $erro = 'Verifique o campo Resposta';
            echo  'Verifique o campo Resposta';
        } elseif ($_POST['tipo'] == 1) {
            if (!isset($_POST['enigma']) || (empty($_POST['enigma']))) {
                $erro = 'Preencha corretamente o campo Enigma!';
                echo 'Preencha corretamente o campo Enigma!';
            }
        } elseif (($_POST['tipo'] != 1) && (!isset($_FILES['arquivo']['name']))) {
            $erro = 'Se enigma for do tipo: Imagem, Audio ou Video é necessario anexar uma arquivo!';
            echo 'Se enigma for do tipo: Imagem, Audio ou Video é necessario anexar uma arquivo!';
        }

        if (!isset($erro)) {
            echo 'final bom';
        } else {
            echo 'final ruim';
            $this->toast($erro, 'ERRO', 'danger');
            //header("Location: index.php?pagina=form-enigma");
        }
    }


    public function arquivoUpload()
    {
        $URL = false;
        $nome_arquivo = null;
        $diretorio = '../public/img/';

        /* cadastro de arquivo e validação do arquivo */
        if (($_POST['tipo'] != 1) && (isset($_FILES['arquivo']['tmp_name']))) {
            $nome_arquivo = date_timestamp_get(date_create()) . basename($_FILES['arquivo']['name']);

            if (move_uploaded_file($_FILES['arquivo']['tmp_name'],  $diretorio . $nome_arquivo)) {
                $URL = "http://" . $_SERVER['SERVER_NAME'] . "/" . "Arcano" . $diretorio . $nome_arquivo; //url que vai para o banco
                return $URL;
            } else {
                $this->toast('Falha no upload do arquivo', 'ERRO', 'danger');
                //header("Location: index.php?pagina=form-enigma");
            }
        } else {
            $this->toast('Falha no upload do arquivo', 'ERRO', 'danger');
            //header("Location: index.php?pagina=form-enigma");
        }
    }
}
