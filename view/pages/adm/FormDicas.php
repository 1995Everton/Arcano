<div class="container my-3" style="height: 80%">
    <div class="nes-container with-title is-centered" style="height: 100%;">
        <p class="bg-transparent text-white" style="font-size: 30px"><?= $config['titulo']; ?></p>
        <form action="index.php?pagina=persistencia-dicas&acao=<?= $config['acao']; ?>" method="POST" style="height: 88%">
            <div class="row justify-content-center align-items-center" style="height: 100%">
                <div class="col-12 text-left">
                    <label class="text-white text-left">Enigma</label>
                    <div class="nes-select">
                        <select name="dicas_enigmas_id">
                            <?php foreach ($config['enigmas'] as $key => $enigma) : ?>
                                <option <?= $enigma['id_enigmas'] == $config['dica']['dicas_enigmas_id'] ? 'selected' : ''; ?> value="<?= $enigma['id_enigmas']; ?>">
                                    <?= $enigma['enigma']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="nes-field">
                        <label class="text-white text-left">Dica</label>
                        <input type="text" name="Dica" value="<?= $config['dica']['dica'] ?>" class="nes-input">
                    </div>
                </div>
                <div class="col-4 text-left">
                    <label class="text-white text-left">Tipo</label>
                    <div class="nes-select">
                        <select name="dicas_tipos_id">
                            <?php foreach ($config['tipos'] as $key => $tipo) : ?>
                                <option <?= $tipo['id_tipos'] == $config['dica']['dicas_tipos_id'] ? 'selected' : ''; ?> value="<?= $tipo['id_tipos']; ?>">
                                    <?= $tipo['ds_tipo']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-4 text-left">
                    <label class="text-white text-left">Categoria</label>
                    <div class="nes-select">
                        <select name="categoria_dicas_id">
                            <?php foreach ($config['categorias'] as $key => $categoria) : ?>
                                <option <?= $categoria['id_categoria_dica'] == $config['dica']['categoria_dicas_id'] ? 'selected' : ''; ?> value="<?= $categoria['id_categoria_dica']; ?>">
                                    <?= $categoria['ds_categoria']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <a href="index.php?pagina=tabela-dica" class="nes-btn btn-block">Voltar</a>
                </div>
                <div class="col-3">
                    <button type="submit" class="nes-btn is-success btn-block"><?= $config['titulo_button']; ?></button>
                </div>
            </div>
        </form>
    </div>
</div>