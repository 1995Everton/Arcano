<?php
if(empty($_SESSION['usuario_logado']) && empty($_SESSION['pontuacao_usuario'])){
    header("Refresh: 0");
}else{
    //$usuario_logado = $_SESSION['usuario_logado'];
    echo $_SESSION['nome_usuario'] . ", também conhecida como " . $_SESSION['titulo_usuario'] . ". O seu progresso atual: " . $_SESSION['pontuacao_usuario'];
}



