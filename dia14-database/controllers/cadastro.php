<?php 
    require_once "../models/conexao.php";
    require_once "funcoes.php";

    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');
    $papel = trim($_POST['papel']);

    try {
        validarCampoVazioCadastro($nome, $email, $senha);
        validarTamanho($nome, $email,$senha);

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare('INSERT INTO usuarios (nome, email, senha, papel) VALUES (:nome, :email, :senha, :papel)');
        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':senha', $senhaHash, PDO::PARAM_STR);
        $stmt->bindValue(':papel', $papel, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "Usuário Cadastrado!";
            $cadastrado = true;
            mensagemRetorno($cadastrado);
            
            // Deixando explicito o fechamento
            // $stmt->closeCursor();
        }

    } catch (\Throwable $e) {
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
    }
?>