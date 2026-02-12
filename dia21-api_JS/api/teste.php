<?php 
    header('Content-Type: application/json');

    echo json_encode([
    'status' => 'sucesso',
    'mensagem' => 'API funcionando'
    ]);
?>