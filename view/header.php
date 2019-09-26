<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Arcanos</title>
     <!-- Plugins CSS-->
    <link rel="stylesheet" href="css/lib/bootstrap.css">
    <link rel="stylesheet" href="css/lib/fontawesome/css/all.min.css">
    <link href="https://unpkg.com/nes.css@2.2.0/css/nes.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />
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
    <div class="">

