<?php 
    require_once "conexao.php";

    // Funções de Cadastro
    function validarCampoVazioCadastro($nome, $email, $senha){
        if ((empty($nome)) || (empty($email)) || (empty($senha))) {
            throw new Exception("Campo(s) Vázio(s)!");   
        }
            return true;
            exit;
    }

    function validarTamanho($nome, $email,$senha){
            if ((strlen($nome)) < 3 || (strlen($senha)) < 3) {
                throw new Exception("Tamanho minimo de 3 caracteres para Nome e/ou Senha!");
            }
            return true;
            exit;
    }

    function mensagemRetorno($cadastrado) {
        if ($cadastrado === true) {
            echo "<script>
                alert('Usuário Cadastrado com Sucesso!');
                window.location.href = 'login.html';
                </script>";
            exit;
        }
    }

    // Funções de Login
    function validarCampoVazioLogin($email, $senha){
        if ((empty($email)) || (empty($senha))) {
            throw new Exception("Campo(s) Email e/ou Senha Vazio(s)!");   
        }
        return true;
        exit;
    }

    function validarSenhas($senhaDigitada, $senhaBanco, $emailUsuario){
        $verificacao = password_verify($senhaDigitada,$senhaBanco);
        if ($verificacao) {
            $_SESSION['logado'] = true;
            $_SESSION['user_email'] = $emailUsuario;

            echo "<script>
            alert('Usuário Logado com Sucesso!');
            window.location.href = 'listar.php';
          </script>";
        }else {
            throw new Exception("Senha Incorreta");
            exit;
        }
    }
?>