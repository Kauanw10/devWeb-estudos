<?php 
    if ($_SESSION['logado'] === false) {
        echo "<script>alert('Acesso Negado')</script>";
        require_once "login.html";
    }else {
        echo "Bem-vindo, você está autênticado!";
    }
?>