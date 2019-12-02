<div class="container-enigmas fases mx-auto">
    <div class="d-flex justify-content-between mb-2">
        <div class="d-flex align-items-center">
            <span class="nes-text text-white mr-2">Fases</span>
            <a href="#" class="nes-badge">
                <span class="is-success"><?= $fase; ?>/8</span>
            </a>
        </div>
        <div class="d-flex align-items-center">
            <span class="nes-text text-white mr-2">Tentativas</span>
            <a href="#" class="nes-badge">
                <span class="is-error"><?= $tentativas; ?>/8</span>
            </a>
        </div>
    </div>
    <div>
        <section class="message -right justify-content-end row">
            <div class="col-7 nes-balloon from-right d-flex align-items-center justify-content-center">
                <p class="text-justify"><?= $dica; ?></p>
            </div>
            <img class="col-2 dark-mage" src="img/run.gif">
        </section>
    </div>
    <div class="nes-container is-rounded background d-flex justify-content-center align-items-center">
        <p class="text-white text-justify"><?= $enigma['enigma']; ?></p>
    </div>
    <div class="mx-4 my-5">
        <form action="index.php?pagina=enigma-fase" method="post">
            <div class="row justify-content-between align-items-center">
                <div class="nes-field col-9">
                    <input name="resposta" vtype="text" class="nes-input" placeholder="Responda-me...">
                    <input name="id" value="<?= $enigma['id_enigmas']; ?>" style="display: none">
                </div>
                <div class="col-3">
                    <button type="submit" class="nes-btn is-success">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>