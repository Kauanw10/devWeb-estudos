<?php 
    require_once "conexao.php";

    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    try {
        validarCampoVazio($nome, $email, $senha);
        validarTamanho($nome, $email,$senha);

        $stmt = $pdo->prepare('INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)');
        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':senha', $senha, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "Usuário Cadastrado!";
            $cadastrado = true;
            mensagemRetorno($cadastrado);
            // Deixando explicito o fechamento
            // $stmt->closeCursor();
        }

    } catch (\Throwable $e) {
        echo $e->getMessage();
    }

    function validarCampoVazio($nome, $email, $senha){
        if ((empty($nome)) || (empty($email)) || (empty($senha))) {
            throw new Exception("Campo(s) Vázio(s)!");
            return false;   
        }
        return true;
    }

    function validarTamanho($nome, $email,$senha){
        if ((strlen($nome)) < 3 || (strlen($senha)) < 3) {
           throw new Exception("Tamanho minimo de 3 caracteres para Nome e/ou Senha!");
           return false;
        }
        return true;
    }

    function mensagemRetorno($cadastrado) {
        if ($cadastrado === true) {
         echo "<script>
            alert('Usuário Cadastrado com Sucesso!');
            window.location.href = 'listar.php';
          </script>";
        }
    }


?>