<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Arcanos</title>
         <!-- Plugins CSS-->
        <link rel="stylesheet" href="css/lib/bootstrap.css">
        <link rel="stylesheet" href="css/lib/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="css/lib/nes.css">
         <!-- Css Projeto-->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/dropdown.css">
        <link rel="stylesheet" href="css/enigma-3.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/background.css">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/table.css">
        <!-- Plugins JavaScript-->
        <script src='js/lib/jquery-3.4.1.js'></script>
        <script src='js/lib/jquery.tablesorter.js'></script>
        <script src='js/lib/bootstrap.js'></script>
        <script src='js/lib/TweenLite.min.js'></script>
        <script src='js/lib/Physics2DPlugin.min.js'></script>
        <script src='js/lib/lodash.min.js'></script>
        <!--JavaScript Projeto-->
        <script src="js/background.js"></script>
    </head>

    <body>
        <?php if(isset($_SESSION['id_usuarios'])):
                include __DIR__."./navbar.php";
        endif; ?>
        <?php if(isset($_SESSION['toast-mensagem'])): ?>
            <div class="toast bg-<?= $_SESSION['toast-color'];?>" data-delay="4000">
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
        endif; ?>
        <?php include __DIR__."/background.php"?>

