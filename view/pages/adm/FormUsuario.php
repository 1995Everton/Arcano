<div class="container my-3" style="height: 80%">
    <div class="nes-container with-title is-centered" style="height: 100%">
        <p class="bg-transparent text-white" style="font-size: 30px"><?= $titulo; ?></p>
        <form action="index.php?pagina=persistencia-usuario<?= $url_post; ?>" method="POST" style="height: 88%">
            <div class="row justify-content-center align-items-center" style="height: 100%">
                <div class="col-6">
                    <div class="nes-field">
                        <label class="text-white text-left">Nome</label>
                        <input type="text" name="Nome" value="<?= $usuario['nome_usuario']; ?>" class="nes-input">
                    </div>
                </div>
                <div class="col-6">
                    <div class="nes-field">
                        <label class="text-white text-left">Email</label>
                        <input type="text" name="email" value="<?= $usuario['email']; ?>" class="nes-input">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="nes-field">
                        <label  class="text-white text-left">Senha</label>
                        <input type="text" name="Senha"  class="nes-input">
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="nes-field">
                        <label  class="text-white text-left">Repita Senha</label>
                        <input type="text" name="senha_repita"  class="nes-input">
                    </div>
                </div>
                <div class="col-4 text-left">
                    <label class="text-white text-left">Tipo Usuário</label>
                    <div class="nes-select">
                        <select name="tipo_usuario">
                            <?php foreach ($tipo_usuario as $valor) : ?>
                                <option <?= $usuario['categoria_usuarios_id'] == $valor['id_categoria_usuarios'] ? 'selected' : ''; ?> value="<?= $valor['id_categoria_usuarios']; ?>">
                                    <?= $valor['ds_usuario']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="nes-field">
                        <label class="text-white text-left">Foto Url</label>
                        <input type="text" name="Foto" value="<?= $usuario['url_foto']; ?>" class="nes-input">
                    </div>
                </div>
                <div class="col-3">
                    <a href="index.php?pagina=tabela-usuario" class="nes-btn btn-block">Voltar</a>
                </div>
                <div class="col-3">
                    <button type="submit" class="nes-btn is-success btn-block"><?= $titulo_button ?></button>
                </div>
            </div>
        </form>
    </div>
</div>

