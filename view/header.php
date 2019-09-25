<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Arcanos</title>
     <!-- Plugins CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css"/>
    <link rel="stylesheet" href="./css/lib/colorPick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
     <!-- Css Projeto-->
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/dropdown.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/testeBG.css">
    <!-- Plugins JavaScript-->
    <script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/animejs/1.0.0/anime.min.js'></script>
    <script src='js/lib/colorPick.js'></script>
</head>
<body>
    <?php if(isset($_SESSION['logado'])):
            include __DIR__."./navbar.php";
    endif; ?>
    <div>

