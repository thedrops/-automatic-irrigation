<?php

    require_once 'conexao.php';


    // abre a conexão
    $PDO = db_connect();

    //contar o total de plantas
    $sql_count = "SELECT COUNT(*) AS total from rega_registro ";

    $id_usuario = $_SESSION['user_id'];
  

    // SQL para selecionar os registros
    $sql = "SELECT * FROM rega_registro where id_usuario=".$id_usuario;

    //contar o total de registros
    $stmt_count = $PDO->prepare($sql_count);
    $stmt_count->execute();
    $total = $stmt_count->fetchColumn();

    // seleciona os registros
    $stmt = $PDO->prepare($sql);
    $stmt->execute();


?>
