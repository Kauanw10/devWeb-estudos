<?php 
    require_once "../controllers/funcoes.php";
    require_once "../config/env.php";

    try {

        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (\PDOException $e) {
        
        if (ENV === 'prod') {
            registrarErro($e);
            echo "Ops! Ocorreu um erro inesperado. Tente novamente mais tarde.";

        } else {
            echo "<strong>Erro Técnico:</strong> " . $e->getMessage();
            echo "<br>Arquivo: " . $e->getFile() . " na linha " . $e->getLine();

        }
        exit;
    }
?>