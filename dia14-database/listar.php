<?php 
    session_start();
    if ( !isset($_SESSION['logado']) ||$_SESSION['logado'] !== true) {
       header("Location: login.html");
       exit;
    }
    require_once "conexao.php";
    
    $stmt = $pdo->prepare("SELECT * FROM usuarios");
    $stmt->execute();

    echo "Partiu Listar";
    $lista = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r($lista);
    print_r($_SESSION);
    echo "</pre>";
?>