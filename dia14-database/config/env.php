<?php 
    require_once "../controllers/funcoes.php";

    define('DB_HOST', 'localhost');
    define('DB_NAME', 'sistema');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('ENV', 'prod');

    if (ENV === 'dev') {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        ini_set('log_errors', 0);
    } else {
        ini_set('display_errors', 0);
        ini_set('log_errors', 1);
        ini_set('error_log', __DIR__ . '/../logs/erros.log');
        ini_set('display_startup_errors', 0);
    }


?>