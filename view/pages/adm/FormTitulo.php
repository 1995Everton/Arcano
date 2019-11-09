<style>
    .test{
        margin-top: 20px;
    }
</style>
<div class="container my-5" >
    <div class="nes-container with-title is-centered" >
        <p class="bg-transparent text-white" style="font-size: 30px"><?= $config['titulo']; ?></p>
        <form action="index.php?pagina=persistencia-titulo&acao=<?= $config['acao']; ?>"  method="POST" >
            <div class="row justify-content-center align-items-center" >
                <div class="col-4 mt-2">
                    <div class="nes-field">
                        <label for="resposta" class="text-white text-left">Nome Título</label>
                        <input type="text" name="Titulo" id="titulo" class="nes-input" value="<?=$config['titulos']['ds_titulo']; ?>">
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="test">
                    <a href="index.php?pagina=tabela-titulo" class="nes-btn btn-block">Voltar</a>
                    <button type="submit" class="nes-btn is-success btn-block"><?= $config['titulo_button']; ?></button>
                </div>
            </div>
        </form>
    </div>
</div>