<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Arcanos</title>
     <!-- Plugins CSS-->
    <link rel="stylesheet" href="css/lib/bootstrap.css">
    <link rel="stylesheet" href="css/lib/fontawesome/css/all.min.css">
     <!-- Css Projeto-->
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/dropdown.css">
    <link rel="stylesheet" type="text/css" href="css/testeBG.css">
    <!-- Plugins JavaScript-->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</head>
<body>
    <?php if(isset($_SESSION['id_usuarios'])):
            include __DIR__."./navbar.php";
    endif; ?>
<?php include __DIR__."/background.php"?>

