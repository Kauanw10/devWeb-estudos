<?php 
    function redirecionarAposLogin($papel){
       if ($papel === 'admin') {
           header("Location: ../views/admin.php");
           exit;
        }else {
            header("Location: ../views/perfil.php");
            exit;
       }
       exit;
    }

    function verificarAdmin(){
        if ( !isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
            header("Location: ../views/login.html");
            exit;
        }
        
        if ($_SESSION['papel'] !== 'admin') {
            header("Location: ../views/perfil.php");
            exit;
        }
    }
?>