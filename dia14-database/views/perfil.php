<?php 
    session_start();
    require_once "../models/conexao.php";
    
    $stmt = $pdo->prepare("SELECT * FROM usuarios");
    $stmt->execute();
    $lista = $stmt->fetchAll(\PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <h4>User Infos</h4>

    <p>E-mail: <?= $_SESSION['user_email']?></p>
    <p>Papel: <?= $_SESSION['papel']?></p>


    <a href="../controllers/sair.php">Sair</a>
</body>
</html>