<?php 
    require_once "../models/conexao.php";
    require_once "auth.php";

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
                window.location.href = '../views/login.html';
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

    function validarSenhas($senhaDigitada, $senhaBanco, $emailUsuario, $papel){
        $verificacao = password_verify($senhaDigitada,$senhaBanco);
        if ($verificacao) {
            $_SESSION['logado'] = true;
            $_SESSION['user_email'] = $emailUsuario;
            $_SESSION['papel'] = $papel;
            redirecionarAposLogin($papel);
        }else {
            throw new Exception("Senha incorreta!");
            exit;
        }
    }

    // Função para Registro de ERROS
    
    function registrarErro($e) {
    $arquivoLog = __DIR__ . '/../logs/erros.log';
    // __DIR__ . '/../logs/erros.log' -> Retorna o caminho do diretório para o arquivo atual, sai do diretório atual e vai para a pasta de logs no arquivo erros.log e guarda tudo na variavel $arquivoLog.

    $mensagem = "[" . date('Y-m-d H:i:s') . "]" . PHP_EOL;
    $mensagem .= "Mensagem: " . $e->getMessage() . PHP_EOL;
    $mensagem .= "Arquivo: " . $e->getFile() . PHP_EOL;
    $mensagem .= "Linha: " . $e->getLine() . PHP_EOL;
    $mensagem .= "---------------------------------------" . PHP_EOL;
    // Usamos PHP_EOL (EndOfLine) para pular linha de acordo com o sistema operacional

    // 3. Gravamos no arquivo (o parâmetro '3' indica que é um arquivo específico)
    error_log($mensagem, 3, $arquivoLog);
}

?>