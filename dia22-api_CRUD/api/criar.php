<?php 
    require_once "../controllers/funcoes.php";
    require_once "../model/conexao.php";
    
    header('Content-Type: application/json');
    $json = file_get_contents('php://input');
    $dados = json_decode($json, true);

    if (!$dados || empty($dados['titulo']) || empty($dados['desc'])) {
    echo json_encode(["status" => "Atenção","titulo" => "Preencha todos os campos"]);
    exit;
    }

    // Aplicar logica do banco de dados
    $stmt = $pdo->prepare('INSERT INTO tarefas (titulo, descricao, situacao) VALUES (:titulo, :descricao, :situacao)');
    $stmt->bindValue('titulo', $dados['titulo'], PDO::PARAM_STR);
    $stmt->bindValue('descricao', $dados['desc'], PDO::PARAM_STR);
    $stmt->bindValue('situacao', $dados['status'], PDO::PARAM_STR);
 
    $retorno = inserirTarefa($stmt);

    echo json_encode($retorno);
    exit;
?>