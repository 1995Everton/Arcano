<style>
    .row div{
        margin: 1em 0;
    }
    .nes-container{
        background-color: #1c2025d1;
    }
</style>
<div class="container my-5" >
    <div class="nes-container with-title is-centered" >
        <p class="bg-transparent text-white" style="font-size: 30px"><?= $config['titulo']; ?></p>
        <form action="index.php?pagina=persistencia-titulo&acao=<?= $config['acao']; ?>"  method="POST" >
            <div class="row" >
                <div class="col-12 mt-2">
                    <div class="nes-field">
                        <label for="resposta" class="text-white text-left">Nome Título</label>
                        <input type="text" name="Titulo" id="titulo" class="nes-input" value="<?=$config['titulos']['ds_titulo']; ?>">
                    </div>
                </div>
                <div class="col-6">

                    <div class="nes-select text-left">
                        <label class="text-white ">Tipo da Regra(Nº)</label>
                        <select name="id_regra_titulo">
                            <?php foreach ( $config['regras'] as $key => $regras) : ?>
                                <option <?= $regras['id_regra'] == $config['titulos']['id_regra_titulo'] ? 'selected' : ''; ?> value="<?= $regras['id_regra']; ?>">
                                    <?= $regras['ds_regra']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="nes-field">
                        <label for="resposta" class="text-white text-left">Quantidade</label>
                        <input type="text" name="Quantidade" id="titulo" class="nes-input" value="<?=$config['titulos']['quantidade']; ?>">
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-around">
                    <a href="index.php?pagina=tabela-titulo" class="nes-btn btn-block w-25">Voltar</a>
                    <button type="submit" class="nes-btn is-success btn-block w-25"><?= $config['titulo_button']; ?></button>
                </div>
            </div>
        </form>
    </div>
</div>