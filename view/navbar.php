<style>
     ul ul{
        position: absolute;
        visibility: hidden;
        list-style: none;
        padding: 3px;
    }
     ul li:hover ul{
        visibility: visible !important;
         z-index: 7;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="https://getbootstrap.com.br/docs/4.1/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Arcano
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <?php if($_SESSION['tipo_usuario'] == 'Administrador'){?>
                <li class="nav-item"><a class="nav-link" href="index.php?pagina=home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Cadastros</a>
                    <ul class="bg-light">
                        <li class="nav-item"><a class="nav-link" href="index.php?pagina=tabela-enigma">Enigmas</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?pagina=tabela-titulo">Título</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?pagina=tabela-usuario">Usuário</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?pagina=tabela-dica">Dicas</a></li>
                    </ul>
                </li>
            <?php }else{ ?>
                <li class="nav-item"><a class="nav-link" href="index.php?pagina=home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?pagina=enigma-home">Enigmas</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?pagina=ranking">Ranking</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?pagina=perfil">Perfil</a> </li>
            <?php } ?>
        </ul>
    </div>
    <div class="profile">
        <div class="photo">
            <img src="<?= $_SESSION['url_foto']?>"/>
        </div>
        <div class="content">
            <div class="text">
                <span><?= $_SESSION['nome_usuario']?></span>
            </div>
            <div class="btn logout"><i class="fas fa-sign-out-alt"></i></div>
        </div>
    </div>
</nav>
<script>
    $('.logout').click(function () {
        window.location.href = 'index.php?pagina=autenticar&acao=logout';
    })
</script>
