<div class="container my-3" style="height: 80%">
    <div class="nes-container with-title is-centered" style="height: 100%">
        <p class="bg-transparent text-white" style="font-size: 30px">Cadastro de Enigmas</p>
        <form action="index.php?pagina=enigma-persistencia" enctype="multipart/form-data" method="POST" style="height: 88%">
            <div class="row justify-content-center align-items-center" style="height: 100%">
                <div class="col-12">
                    <!-- Campo -> Enigma -->
                    <div class="nes-field">
                        <label for="enigma" class="text-white text-left">Enigma</label>
                        <textarea type="text" name="enigma" id="enigma" class="nes-textarea" style="resize: none"></textarea>
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <!-- Resposta -->
                    <div class="nes-field">
                        <label for="resposta" class="text-white text-left">Resposta</label>
                        <input type="text" name="resposta" id="resposta" class="nes-input">
                    </div>
                </div>
                <div class="col-4 text-left">
                    <!-- Campo Dificuldade enigma -->
                    <label for="dificuldade" class="text-white text-left">Dificuldade</label>
                    <div class="nes-select">
                        <select name="dificuldade" id="dificuldade">
                            <?php foreach($ds_categoria as $valor):?>
                                <option value="<?= $valor['id_categoria_dica'];?>">
                                    <?= $valor['ds_categoria'];?>
                                </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="col-4 text-left">
                    <!-- Campo -> Tipo do enigma -->
                    <label for="tipo" class="text-white">Tipo</label>
                    <div class="nes-select">
                        <select name="tipo" id="tipo">
                            <?php foreach ($ds_tipos as $valor): ?>
                                <option value="<?= $valor['id_tipos']?>">
                                    <?= $valor['ds_tipo']?>
                                </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <!-- Arquivo -->
                    <div class="nes-field">
                        <label for="arquivo" class="text-white text-left">Arquivo</label>
                        <input type="file" name="arquivo" id="arquivo" class="nes-input">
                    </div>
                </div>
                <div class="col-3">
                    <button type="submit" class="nes-btn is-success btn-block">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</div>