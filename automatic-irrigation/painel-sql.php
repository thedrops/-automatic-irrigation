<?php
require_once 'conexao.php';
    // abre a conexão
    $PDO = db_connect();
    //echo $_SESSION['user_id'];
    // SQL para selecionar os registros
    $sql = "SELECT * FROM usuario WHERE id_usuario=".$_SESSION['user_id'];

    // seleciona os registros
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
