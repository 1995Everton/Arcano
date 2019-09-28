<div class="row justify-content-center">
    <div class="col-9">
        <a href="#" class="nes-badge is-splited">
            <span class="is-dark">Fase</span>
            <span class="is-primary"><?= $fase; ?></span>
        </a>
        <a href="#" class="nes-badge is-splited">
            <span class="is-dark">Tentativa</span>
            <span class="is-primary"><?= $tentativas; ?></span>
        </a>
        <section class="message-list">
            <section class="message -right">
                <div class="nes-balloon from-right">
                    <p><?= $dica; ?></p>
                </div>
                <img width="100" height="150" src="img/run.gif">
            </section>
        </section>
        <div class="nes-container is-rounded">
            <p><?= $enigma['enigma']; ?></p>
        </div>
        <div class="m-4">
            <form action="index.php?pagina=enigma-fase" method="post">
                <div class="row justify-content-between align-items-center">
                    <div class="nes-field col-9">
                        <label>Sua Resposta</label>
                        <input name="resposta"vtype="text" class="nes-input">
                        <input name="id" value="<?=$enigma['id_enigmas'];?>" style="display: none">
                    </div>
                    <div class="col-3">
                        <button type="submit" class="nes-btn is-success">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>