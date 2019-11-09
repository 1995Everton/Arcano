<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Arcanos</title>
         <!-- Plugins CSS-->
        <link rel="stylesheet" href="css/lib/bootstrap.css">
        <link rel='stylesheet' href='css/lib/bootstrap-material-design.min.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <link rel="stylesheet" href="css/lib/nes.css">
        <link rel="stylesheet" href="css/lib/animate.css">
        <link rel="stylesheet" href="css/lib/simplebar.css">
         <!-- Css Projeto-->
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/dropdown.css">
        <link rel="stylesheet" href="css/enigma.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/background.css">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/table.css">
        <link rel="stylesheet" href="css/chat.css">
        <!-- Plugins JavaScript-->
        <script src='js/lib/jquery-3.4.1.js'></script>
        <script src='js/lib/jquery.tablesorter.js'></script>
        <script src='js/lib/bootstrap.js'></script>
        <script src="js/lib/socket.io.js"></script>
        <script src="js/lib/simplebar.min.js"></script>
        <script src="js/lib/axios.min.js"></script>
        <!--JavaScript Projeto-->
        <script src="js/background.js"></script>
        <script src="js/chat.js"></script>
        <script src="js/global.js"></script>
    </head>

    <body>
    <div id="toast"></div>
        <?php if(isset($_SESSION['id_usuarios'])):
                include __DIR__."./navbar.php";
                include __DIR__ . "./chat.php";?>
            <script>
                var USUARIO_GLOBAL = {
                    id_usuarios: <?=$_SESSION['id_usuarios'];?>,
                    url_foto: '<?=$_SESSION['url_foto'];?>',
                    nome_usuario: '<?=$_SESSION['nome_usuario'];?>'
                }
            </script>
       <?php endif; ?>
        <?php if(isset($_SESSION['toast-mensagem'])): ?>
            <div class="toast bg-<?= $_SESSION['toast-color'];?>" data-delay="<?= $_SESSION['toast-delay'];?>">
                <div class="toast-header">
                    <strong class="mr-auto"><?= $_SESSION['toast-header'];?></strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <i class="nes-icon close is-small"></i>
                    </button>
                </div>
                <div class="toast-body "><?= $_SESSION['toast-mensagem'];?></div>
            </div>
            <script>$('.toast').toast('show')</script>
        <?php
            unset($_SESSION['toast-mensagem']);
            unset($_SESSION['toast-header']);
            unset($_SESSION['toast-color']);
            unset($_SESSION['toast-delay']);
        endif; ?>
        <?php include __DIR__."/background.php"?>

