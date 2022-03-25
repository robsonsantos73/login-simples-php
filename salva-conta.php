<?php
    session_start();
    include_once("conexao.php");

    //RECEBE DADOS POST
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = strtolower(strtoupper(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL))); // FILTRA EMAIL E CONVERTE EM  LETRAS minúsculas.
    $senha1 = filter_input(INPUT_POST, 'senha1', FILTER_SANITIZE_STRING);
    $senha2 = filter_input(INPUT_POST, 'senha2', FILTER_SANITIZE_STRING);
    //FIM RECEBE DADOS POST

    if (!empty($nome) && !empty($email) && !empty($senha1) && !empty($senha2)) {
        

        //VERIFICA SE AS SENHAS SÃO IGUAIS
        if ($senha1 != $senha2) {
            $_SESSION['msg'] = "As senhas são diferentes";
            header("Location: cria-conta.php");
            exit;
        }
        //FIM VERIFICA SE AS SENHAS SÃO IGUAIS

        $senhaCript = password_hash($senha1, PASSWORD_DEFAULT); //USA A FUNÇAO PASSWORD_HASH DO PHP

        $salvaDados = $pdo->query("INSERT INTO usuarios (nome, email, senha) VALUES ('$nome','$email','$senhaCript')"); //SALVA NO BANCO

        if($salvaDados){
            $_SESSION['msg'] = "Salvo. Entre com seus dados.";
            header("Location: login.php");
        }else{
            $_SESSION['msg'] = "Erro! Tente novamente.";
            header("Location: cria-conta.php");
        }

    }else{
        $_SESSION['msg'] = "Preencha todos os campos";
        header("Location: cria-conta.php");
    }

    
?>