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
                header("Location: index.php?pagina=form-enigma");
                break;
        }
    }

    public function validarPost()
    {
        /* Validacao dos campos do formulário */
        if (!isset($_POST['dificuldade']) || (empty($_POST['dificuldade']))) {
            $erro = 'Verifique o campo de Dificuldade';;
        } elseif ((!isset($_POST['tipo'])) || ($_POST['tipo'])) {
            $erro = 'Verifique o campo Tipo';
        } elseif ((!isset($_POST['resposta'])) || (empty($resposta))) {
            $erro = 'Verifique o campo Resposta';
        } elseif ($_POST['tipo'] == 1) {
            if (!isset($_POST['enigma']) || (empty($_POST['enigma']))) {
                $erro = 'Preencha corretamente o campo Enigma!';
            }
        }

        /* cadastro de arquivo e validação do arquivo */
        if ($_POST['tipo'] != 1) {
            $arquivo_temporario = $_FILES['arquivo']['tmp_name'];
            $nome_arquivo = date_timestamp_get(date_create()) . basename($_FILES['arquivo']['name']);
            $diretorio = '../public/img/uploaded_arqs/';

            if (move_uploaded_file($arquivo_temporario, $diretorio . $nome_arquivo)) {
                $URL = "http://" . $_SERVER['SERVER_NAME'] . "/" . "Arcano" . "/public/img/uploaded_arqs/" . $nome_arquivo; //url que vai para o banco
            } else {
                $erro = 'Erro no envio do arquivo!';
            }
        } else {
            $erro = 'Se enigma for do tipo: Imagem, Audio ou Video é necessario anexar uma arquivo!';
        }

        /* Validaçao se cadastra no banco ou Retorna mensagem de erro; */
        if (!isset($erro)) {
            // if (!empty($_POST['enigma'])) {
            // } else {
            //     $this->novoEnigma($URL);
            // }
            $this->toast($erro, 'ERRO', 'danger');
            header("Location: index.php?pagina=form-enigma");
        } else {
            $this->toast($erro, 'ERRO', 'danger');
            header("Location: index.php?pagina=form-enigma");
        }

        return true;
    }

    public function novoEnigma()
    {
        if ($this->validarPost() == true) {
            $this->banco->insert(
                'enigmas',
                [
                    'dificuldade_enigma_id' => $_POST['dificuldade'],
                    'enigmas_tipos_id' => $_POST['tipo'],
                    'enigma' => (empty($_POST['enigma'])) ? $_POST['enigma'] : arquivo(),
                    'data' => date('Y-m-d'),
                    'resposta' => $_POST['resposta']
                ]
            );
        }
    }

    public function editar()
    {
        if ($this->validarPost() == true) {
            $this->banco->update(
                'enigmas',
                [
                    'dificuldade_enigma_id' => $_POST['dificuldade'],
                    'enigmas_tipos_id' => $_POST['tipo'],
                    'enigma' =>  $_POST['enigma'],
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
        $this->banco->delete(
            'enigmas',
            [
                'id_enigmas' => $_GET['id']
            ]
        );
    }

    public function arquivo()
    {
        $arquivo_temporario = $_FILES['arquivo']['tmp_name'];
        $nome_arquivo = date_timestamp_get(date_create()) . basename($_FILES['arquivo']['name']);
        $diretorio = '../public/img/uploaded_arqs/';

        if (move_uploaded_file($arquivo_temporario, $diretorio . $nome_arquivo)) {
            return "http://" . $_SERVER['SERVER_NAME'] . "/" . "Arcano" . "/public/img/uploaded_arqs/" . $nome_arquivo; //url que vai para o banco
        } else {
            return $erro = 'Erro no envio do arquivo!';
        }
    }
}
