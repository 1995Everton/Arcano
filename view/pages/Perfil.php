<?php
if(empty($_SESSION['usuario_logado']) && empty($_SESSION['pontuacao_usuario'])){
    header("Refresh: 0");
}
?>


<div class="sky">
    <div class="sky-level">
    </div>
    <div class="sky-level"></div>
    <div class="sky-level"></div>
    <div class="sky-level"></div>
    <div class="sky-level"></div>
    <div class="sky-level"></div>
    <div id="stars" class="sky-stars">
        <img style="position: absolute;width: 100%; height: 100%" src="img/star.gif">
        <div style="color: white">
        <?php echo $_SESSION['nome_usuario'] . ", também conhecida como " . $_SESSION['titulo_usuario'] . ". O seu progresso atual é: " . $_SESSION['pontuacao_usuario'];
        ?>
        </div>>
    </div>
</div>




