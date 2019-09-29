<div id="game-over"></div>
<div class="tentar-novamento row justify-content-center align-items-center">
    <span class="nes-text col-12 text-center text-white h1">Tentar Novamente?</span>
    <div class="d-flex justify-content-between col-3">
        <a href="index.php?pagina=enigma-home" class="nes-btn">Sim</a>
        <a href="index.php?pagina=home" class="nes-btn">Não</a>
    </div>
</div>
<script>
    $(function () {
        var drop = '<div class="game-over"><span>GAME OVER</span></div>';
        for (var i = 0; i < 100; i++) {
            drop += '<div class="drop"></div>'
        }
        $('#game-over').html(drop);
    });
</script>
