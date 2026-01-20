<?php 
    require_once "conexao.php";
    $stmt = $pdo->prepare("SELECT * FROM usuarios");
    $stmt->execute();

    echo "Partiu Listar";
    $lista = $stmt->fetchAll(\PDO::FETCH_COLUMN,2);
    echo "<pre>";
    print_r($lista);
    echo "</pre>";
?>