<?php


namespace Arcanos\Enigmas\Controllers\Adm\Persistencias;


use Arcanos\Enigmas\Controllers\Banco;
use Arcanos\Enigmas\Controllers\RequestHandlerInterface;

class PersistenciaEnigma extends Banco implements RequestHandlerInterface
{
    public function handle()
    {
        if ((isset($_POST)) && (!empty($_POST))) {
            $dificuldade = $_POST['dificuldade']; //Armazena o valor do campo Dificuldade
            $tipo = $_POST['tipo']; //Armazena o valor do campo TIPO
            $enigma = $_POST['enigma']; //$_FILES['arquivo']['error'];//Armazena o valor do campo arquivo
            $resposta = $_POST['resposta']; //Armazena o valor do campo de Resposta
            $imagem = $_FILES['arquivo']['tmp_name']; //salva o nome da imagem
            $erro = null; //Var para validaçao de erros

            /* Validacao dos campos do formulário */
            if (!isset($dificuldade) || (empty($dificuldade))) {
                $erro = 'Verifique o campo de Dificuldade';
            } elseif ((!isset($tipo)) || (empty($tipo))) {
                $erro = 'Verifique o campo Tipo';
            } elseif ((!isset($resposta)) || (empty($resposta))) {
                $erro = 'Verifique o campo Resposta';
            } elseif ($tipo == 1) {
                if (!isset($enigma) || (empty($enigma))) {
                    $erro = 'Preencha corretamente o campo Enigma!';
                }
            } elseif ((!isset($imagem) || (empty($imagem)))) {
                //validação arquivo
                $erro = 'Se enigma for do tipo: Imagem, Audio ou Video é necessario anexar uma arquivo!';
            }
            echo $erro;

            /* Validaçao se cadastra no banco ou Retorna mensagem de erro; */
            if (!isset($erro)) {
                $this->cadastraEnigma($dificuldade, $tipo, $retVal = (!empty($enigma)) ? $enigma : $this->uploadImage($imagem), $resposta);
            } else {
                $this->toast($erro, 'ERRO', 'danger');
                //header("Location: index.php?pagina=enigma-cadastro");
            }

            /* MORE QUESTIONS, se o tipo do enigma for img campo de arquivo 'e requirido como img. se for do tipo texto o campo 'enigma' 'e*/
            echo "<pre>";
            var_dump($_POST);
            echo "</pre>";

            echo "<br>";

            /* ARQUIVO */
            echo "<pre>";
            print_r($_FILES['arquivo']);
            echo "</pre>";


            /* https://www.php.net/manual/pt_BR/function.move-uploaded-file.php */
            /* https://www.php.net/manual/pt_BR/features.file-upload.post-method.php */
            /* https://www.youtube.com/watch?v=qmNbZmBOaGM */
        } else {
            $this->toast('Erro no envio do formulário!', 'ERRO', 'danger');
            //header("Location: index.php?pagina=enigma-cadastro");
        }
    }

    public function uploadImage($imagem)
    {

        if (!empty($imagem)) {
            $arquivo_temporario = $imagem;
            $arquivo = date_timestamp_get(date_create()) . basename($imagem);
            $diretorio = '../public/img/uploaded_arqs/';

            $arquivo = $diretorio . basename($imagem); //que vai pro Banco
            echo "__DIR__ " . $diretorio . $arquivo;

            if (move_uploaded_file($arquivo_temporario, $diretorio . "/" . $arquivo)) {
                echo "Arquivo válido e enviado com sucesso.\n";
                return $diretorio;
            } else {
                $erro = 'Erro no envio do arquivo!';
            }
        } else {
            $erro = 'Se enigma for do tipo: Imagem, Audio ou Video é necessario anexar uma arquivo!';
        }

        return $erro;
        /*
        $filename = $img;
        $client_id = "e35548a1a0c0fab"; //Meu id de cleinte da imglur
        $handle = fopen($filename, "r");
        $data = fread($handle, filesize($filename));
        $pvars   = array('image' => base64_encode($data));
        $timeout = 30;
        $curl    = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
        $out = curl_exec($curl);
        curl_close($curl);
        $pms = json_decode($out, true);
        $url = $pms['data']['link'];
        if ($url != "") {
            echo "<h2>Uploaded Without Any Problem</h2>";
            echo "url banco: " . $url;
            return $url;
        } else {
            echo "<h2>There's a Problem</h2>";
            echo $pms['data']['error']['message'];
        }
        */
    }

    /* Inserção de dados no banco de dados */
    public function cadastraEnigma($dificuldade, $tipo, $enigma, $resposta)
    {

        //$this->uploadImage();
        echo 'Aprovado e inserido no banco';
        /* $this->banco->insert(
            'enigmas',
            [
                'dificuldade_enigma_id' => $this->handle($dificuldade),
                'enigmas_tipos_id' => s,
                'enigma' => $enigma = (isset($imagem)) ? $imagem : $enigma),
                'data' => date('Y-m-d'),
                'resposta' => utf8_encode($_POST['resposta'])
            ]
        ); */
    }
}
