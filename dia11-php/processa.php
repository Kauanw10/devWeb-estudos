<?php 
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem;

    if (($nome === "") || ($email === "")) {
        $mensagem = "Erro: campos obrigatórios";
    }else {
        $mensagem = "Dados válidos";
    }

    echo $mensagem;
?>