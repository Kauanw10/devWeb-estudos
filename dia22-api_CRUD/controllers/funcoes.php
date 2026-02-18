<?php 
    require_once "../model/conexao.php";

    function inserirTarefa($stmt){
     try {
        if ($stmt->execute()) {
            return ["status" => "Sucesso", "titulo" => "Tarefa Criada"];
        }
        throw new Exception("Falha ao Executar SQL");
        
     } catch (Exception $e) {
        if (ENV === "dev") {
            return ["status" => "Erro", "titulo" => $e->getMessage() . " Arquivo: " . $e->getFile() . " Linha: " . $e->getLine()];
        } else {
            registrarErro($e);
            return ["status" => "Erro", "titulo" => "Tente novamente mais tarde."];
        }
     }
    }

    function registrarErro($e) {
    $arquivoLog = __DIR__ . '/../logs/erros.log';

    $mensagem = "[" . date('Y-m-d H:i:s') . "]" . PHP_EOL;
    $mensagem .= "Mensagem: " . $e->getMessage() . PHP_EOL;
    $mensagem .= "Arquivo: " . $e->getFile() . PHP_EOL;
    $mensagem .= "Linha: " . $e->getLine() . PHP_EOL;
    $mensagem .= "---------------------------------------" . PHP_EOL;
  
    error_log($mensagem, 3, $arquivoLog);
}
?>