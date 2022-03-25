<?php
    session_start();

    if(empty($_SESSION['idUsuario']) && empty($_SESSION['nome'])){
        $_SESSION['msg'] = "Area Restrita";
        header("Location: login.php");
        exit;
    }
    $usuarioLogado = $_SESSION['nome'];
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="images/favicon.png" />
        <link rel="stylesheet" href="css/custom.css">
        <title>Login Simples - Painel</title>
    </head>

    <body>
        <div id="mae">
            <div id="filha" style="height:300px">
                <h3 style="color:blue;">BEM VINDO AO PAINEL</h3>
                <p style="font-weight:bold;"><?php echo $usuarioLogado; ?></p>
                <p>Aqui você encontra tudo referente a sua conta.</p>
                <p> Caso não precise realizar alterações <a href="sair.php"> clique aqui para sair</a></p>
            </div>
        </div>
    </body>
</html>