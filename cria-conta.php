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
        <title>Login Simples-Nova Conta</title>
    </head>

    <body>
        <div id="mae">
            <div id="filha">
                <table id="tblLogin">
                    <form action="salva-conta.php" method="POST">
                        <tr>
                            <td>
                                <img src="images/usuario.png"  alt="Logo Usuario" width="120" height="120" class="logo">
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
                                <tr>
                                ';
                                unset($_SESSION['msg']);
                                
                            }
                        ?>
                        <!--FIM MSG ERRO-->
                        <!--EMAIL-->
                        <tr>
                            <td style="padding-top:30px; padding-left:30px; padding-right:30px; text-align:center;">
                                <input  type="nome" name="nome" id="nome" class="inputTxt" maxlength="100" autofocus required placeholder="Nome Completo">
                            </td> 
                        <tr>
                        <!--FIM EMAIL-->

                        <!--EMAIL-->
                        <tr>
                            <td style="padding-top:10px; padding-left:30px; padding-right:30px; text-align:center;">
                                <input  type="email" name="email" id="email" class="inputTxt" required placeholder="E-mail">
                            </td> 
                        <tr>
                        <!--FIM EMAIL-->

                        <!--SENHA-->
                        <tr>
                            <td style="padding-top:10px; padding-left:30px; padding-right:30px; text-align:center;">
                                <input type="password" name="senha1" id="senha1" class="inputTxt" required placeholder="Senha">
                            </td>
                        <tr>
                        <!--FIM SENHA-->

                        <!--CONFIRMA SENHA-->
                        <tr>
                            <td style="padding-top:10px; padding-left:30px; padding-right:30px; text-align:center;">
                                <input type="password" name="senha2" id="senha2" class="inputTxt" required placeholder=" Confirme a senha">
                            </td>
                        <tr>
                        <!--FIM CONFIRMA SENHA-->

                        <!--BOTAO-->
                        <tr>
                            <td style="padding:10px; text-align:center;" class="nomeUsuario">
                                <input type="submit" name="btnSalvar" class="classeBotao" value="Salvar"><br>
                            </td>
                        <tr>
                        <!--FIM BOTAO-->

                        <!--CRIAR CONTA-->
                        <tr>
                            <td style="text-align:center;" class="nomeUsuario">
                                <a href="login.php" style="text-decoration:none; color:#000; font-size:14px;">Já possui conta? Vá para Login.</a><br>
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