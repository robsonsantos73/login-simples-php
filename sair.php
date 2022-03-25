<?php
    session_start();
    unset($_SESSION['idUsuario'], $_SESSION['nome']); // APAGA AS VARIAVEIS DE SESSAO
    $_SESSION = array();
    session_destroy();//DESTROI A SESSAO

    header("Location: login.php");
?>