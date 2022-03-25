<?php
    session_start();
    if(!empty($_SESSION['idUsuario']) &&  !empty($_SESSION['nome'])){
        header("Location: painel.php");
        exit;	
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="images/favicon.png" />
        <link rel="stylesheet" href="css/custom.css">
        <title>Login Simples - PHP Estrutural</title>
    </head>

    <body>
        <div id="mae">
            <div id="filha">
                <table id="tblLogin">
                    <form action="valida-login.php" method="POST">
                        <tr>
                            <td>
                                <img src="images/cadeado.png"  alt="Logo App" width="120" height="120" class="logo">
                            </td> 
                        <tr>
                        <!--MSG ERRO-->
                        <?php
                            if(isset($_SESSION['msg'])){
                                
                                echo '
                                <tr>
                                    <td style="text-align:center;">
                                        <a href="" style="text-decoration:none; color:red;">'.$_SESSION['msg'].'</a>
                                    </td>
                                <tr>';
                                unset($_SESSION['msg']); 
                                
                            }
                        ?>
                        <!--FIM MSG ERRO-->

                        <!--EMAIL-->
                        <tr>
                            <td style="padding-top:30px; padding-left:30px;padding-right:30px; text-align:center;">
                                <input  type="email" name="email" id="email" class="inputTxt" autofocus required placeholder="E-mail">
                            </td> 
                        <tr>
                        <!--FIM EMAIL-->

                        <!--SENHA-->
                        <tr>
                            <td style="padding:30px; text-align:center;">
                                <input type="password" name="senha" id="senha" class="inputTxt" required placeholder="Senha">
                            </td>
                        <tr>
                        <!--FIM SENHA-->

                        <!--BOTAO-->
                        <tr>
                            <td style="padding:10px; text-align:center;" class="nomeUsuario">
                                <input type="submit" name="btnAcessar" class="classeBotao" value="Acessar"><br>
                            </td>
                        <tr>
                        <!--FIM BOTAO-->

                        <!--CRIAR CONTA-->
                        <tr>
                            <td style="text-align:center;" class="nomeUsuario">
                                <a href="cria-conta.php" style="text-decoration:none; color:#000; font-size:14px;">Não possui conta? Crie agora.</a><br>
                            </td>
                        <tr>
                        <!--FIM CRIAR CONTA-->
                    </form>
                    <tr>
                        <td style="text-align:center;" class="nomeUsuario">
                            <a href="https://github.com/robsonsantos73" style="text-decoration:none; color:gray; font-size:10px;">FULLSTACK DEV. ROBSON SANTOS - <?php echo date("Y");?></a>
                        </td>
                    <tr>
                </table>
            </div>
        </div>
        
    </body>
</html>