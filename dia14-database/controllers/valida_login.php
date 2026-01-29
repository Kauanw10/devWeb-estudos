<?php 
    session_start();
    require_once "../models/conexao.php";
    require_once "funcoes.php";

    $email = trim($_POST['email'] ?? '');
    $senhaDigitada = trim($_POST['senha'] ?? '');

    try {
        validarCampoVazioLogin($email, $senhaDigitada);

        $stmt = $pdo->prepare('SELECT email, senha, papel FROM `usuarios` WHERE email = :email');
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $senhaBanco = $user['senha'];
            $papel = $user['papel'];
            
            validarSenhas($senhaDigitada, $senhaBanco, $user['email'], $papel);
            
        }else {
            throw new Exception("E-mail não encontrado.");
            exit;
        }

    } catch (\Throwable $e) {
        echo $e->getMessage();
    }
?>