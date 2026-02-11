<?php 
    session_start();
    require_once "../models/conexao.php";
    require_once "funcoes.php";
    require_once "../config/env.php";

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
        // Registrando o erro independente do tipo.
    if (ENV === 'prod') {
        registrarErro($e);
        // Em vez de mostrar o erro real, mostramos uma máscara
        echo "Ops! Ocorreu um erro inesperado. Tente novamente mais tarde.";
        } else {
        registrarErro($e);
        // Se for dev, aí sim mostramos tudo para facilitar o seu trabalho
        echo "<strong>Erro Técnico:</strong> " . $e->getMessage();
        echo "<br>Arquivo: " . $e->getFile() . " na linha " . $e->getLine();
    }
    
    // Importante: Se for um erro crítico, pare a execução
    exit;
    }
?>