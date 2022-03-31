<?php
    session_start();
    include_once("conexao.php");

    //RECEBE DADOS POST
    $email= strtolower(strtoupper(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL))); // FILTRA EMAIL E CONVERTE EM  LETRAS minúsculas.
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    //FIM RECEBE DADOS POST


    if (!empty($email) && !empty($senha)) {
        $senhaBd="";
        $id = 0;
        $nome="";

        //INICIA A VALIDAÇÃO DO LOGIN
        $buscaUsuario = $pdo->query("SELECT id, nome, senha FROM usuarios WHERE email='$email' LIMIT 1");
        foreach ($buscaUsuario->fetchAll() as $keyUsu) {
            $id = $keyUsu['id'];
            $nome = $keyUsu['nome'];
            $senhaBd = $keyUsu['senha'];  
        }

        if($buscaUsuario->rowCount()){
            if(password_verify($senha, $senhaBd )){
                $_SESSION['idUsuario'] = $id;

                $primeiroNome = explode(" ", $nome); //CRIA UM ARRAY PARA PEGARMOS O PRIMEIRO NOME
                $primeiroNome = $primeiroNome[0];
                $nomeFiltrado = strlen($primeiroNome) > 15 ? substr($primeiroNome, 0, 15-$tam) : $primeiroNome; //VERIFICA SE NOME POSSUI MAIS DE 15 CARACTERES, SE TIVER + DE 15 APRESENTA APENAS 15 CARACTERES INICIAIS
                $_SESSION['nome'] = $nomeFiltrado;

                header("Location: painel.php");

            }else{
                $_SESSION['msg'] = "Dados Incorretos!";
                header("Location: login.php");
            }

        }else{
            $_SESSION['msg'] = "Dados Incorretos!";
            header("Location: login.php");
        }
        //INICIA A VALIDAÇÃO DO LOGIN
    }else{
        $_SESSION['msg'] = "Preencha todos os campos";
        header("Location: login.php");
        exit;
    }
?>