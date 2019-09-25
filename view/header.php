<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Arcanos</title>
     <!-- Plugins CSS-->
    <link rel="stylesheet" href="css/lib/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css"/>
    <link rel="stylesheet" href="./css/lib/colorPick.css">
     <!-- Css Projeto-->
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/dropdown.css">
    <!-- Plugins JavaScript-->
    <script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/animejs/1.0.0/anime.min.js'></script>
    <script src='js/lib/colorPick.js'></script>
</head>
<body>
    <?php if(isset($_SESSION['id_usuarios'])):
            include __DIR__."./navbar.php";
    endif; ?>
    <div class="container">

