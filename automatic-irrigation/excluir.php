<?php
include('include/header.php');
include('include/nav.php');

    require_once "conexao.php";
    // pega o ID da URL
    $id = isset($_POST['id']) ? $_POST['id'] : null;

     // abre a conexão
     $PDO = db_connect();

     //remove do banco 
     $sql = "DELETE FROM plantas WHERE id_planta = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt->execute();
    
 

include('include/footer.php');
?>