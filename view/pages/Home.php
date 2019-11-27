<img style="position: fixed;width: 100%; height: 100%" src="img/star.gif">
<div class="logoCirculo">
    <img src="img/Circulologo.png">
</div>
<div class="logoPrincipal">
    <img src="img/Logo.png">
</div>
<div>
    <?php if(!isset($_SESSION['nome_usuario'])){?>
        <a href="index.php?pagina=cadastro" class="botaoCadastro nes-btn is-primary" >Cadastro</a>
        <a href="index.php?pagina=login" class="botaoLogin nes-btn is-primary" >Login</a
    <?php }?>
</div>