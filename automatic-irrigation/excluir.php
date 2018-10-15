<?php
    require_once "conexao.php";
    // pega o ID da URL
    $id = isset($_GET['id']) ? $_GET['id'] : null;
 
     // abre a conexão
     $PDO = db_connect();

     //remove do banco 
     $sql = "DELETE FROM plantas WHERE id_planta = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute())
    {
        echo "Planta removida";
    }
    else
    {
        echo "Erro ao remover";
        print_r($stmt->errorInfo());
    }
 
?>