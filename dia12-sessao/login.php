<?php 
    $user = $_POST['usuario'];
    $pass = $_POST['senha'];

    if ($user === "admin" && $pass = 1234) {
        session_start();
        $_SESSION['logado'] = true;
        require_once "dashboard.php";
    }else {
        header("Location: login.html");
    }
?>