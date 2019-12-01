<style>
    .nes-container{
        background-color: #1c2025d1;
    }
</style>
<div class="container my-3" style="height: 80%">
    <div class="nes-container with-title is-centered" style="height: 100%">
        <p class="bg-transparent text-white" style="font-size: 30px">Cadastro de Enigmas</p>
        <form action="<?php
                        if (!isset($id)) {
                            echo 'index.php?pagina=persistencia-enigma&acao=criar';
                        } else {
                            echo 'index.php?pagina=persistencia-enigma&acao=editar&id=' . $id;
                        }
                        ?>" enctype="multipart/form-data" method="POST" style="height: 88%">
            <div class="row justify-content-center align-items-center" style="height: 100%">
                <div class="col-12" id="container-enigma">
                    <!-- Campo -> Enigma -->
                    <div class="nes-field" >
                        <label for="enigma" class="text-white text-left">Enigma</label>
                        <textarea type="text" name="enigma" id="enigma" class="nes-textarea" style="resize: none"><?php if ((isset($_GET['acao'])) && ($_GET['acao'] = 'editar')) {
                                                                                                                        echo $ds_enigma[0]['enigma'];
                                                                                                                    } ?></textarea>
                    </div>
                </div>
                <div class="col-12" id='container-arquivo'>
                    <!-- Arquivo -->
                    <div class="nes-field">
                        <label for="arquivo" class="text-white text-left">Arquivo</label>
                        <input type="file" name="arquivo" id="arquivo" class="nes-input">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <!-- Resposta -->
                    <div class="nes-field">
                        <label for="resposta" class="text-white text-left">Resposta</label>
                        <input type="text" name="resposta" id="resposta" class="nes-input" value="<?php if ((isset($_GET['acao'])) && ($_GET['acao'] = 'editar')) {
                                                                                                        echo $ds_enigma[0]['resposta'];
                                                                                                    } ?>">
                    </div>
                </div>
                <div class="col-4 text-left">
                    <!-- Campo Dificuldade enigma -->
                    <label for="dificuldade" class="text-white text-left">Dificuldade</label>
                    <div class="nes-select">
                        <select name="dificuldade" id="dificuldade">
                            <!--  <option value=""></option> -->
                            <?php foreach ($ds_categoria as $valor) : ?>
                                <option value="<?= $valor['id_categoria_dica']; ?>" <?php
                                                                                        if ((isset($_GET['acao'])) && ($_GET['acao'] = 'editar') &&  $valor['id_categoria_dica'] == $ds_enigma[0]['dificuldade_enigma_id']) {
                                                                                            echo "selected";
                                                                                        }
                                                                                        ?>> <?= $valor['ds_categoria']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-4 text-left">
                    <!-- Campo -> Tipo do enigma -->
                    <label for="tipo" class="text-white">Tipo</label>
                    <div class="nes-select">
                        <select name="tipo" id="tipo">
                            <!-- <option value=""></option> -->
                            <?php foreach ($ds_tipos as $valor) : ?>
                                <option value="<?= $valor['id_tipos'] ?>" <?php
                                                                                if ((isset($_GET['acao'])) && ($_GET['acao'] = 'editar') &&  $valor['id_tipos'] == $ds_enigma[0]['enigmas_tipos_id']) {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>> <?= $valor['ds_tipo'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <a href="index.php?pagina=tabela-enigma" class="nes-btn btn-block">Voltar</a>
                </div>
                <div class="col-3">
                    <button type="submit" class="nes-btn is-success btn-block">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#tipo').change(function() {
            //sempre que  o valor do campo TIPO mudar ele vai fazer os brignetsky
            chengeResponse();
        });
        function chengeResponse() {
            if ($('#tipo').val() == 1) {
                $('#container-enigma').show();
                $('#container-arquivo').hide();
            } else {
                $('#container-enigma').hide();
                $('#container-arquivo').show();
            }
        }
        chengeResponse()
    });
</script>