<?php
    require_once 'conexao.php';
    $usuario = isset($_POST['email']) ? $_POST['email'] : null;
    $senha = sprintf('%07X', mt_rand(0, 0xFFFFFFF));

    if(empty($usuario)){
        echo "Informe o usuário";
        exit;
    }
    
    $PDO = db_connect();
    $sql = "INSERT INTO usuario(usuario,senha) VALUES(:nome,:senha)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome', $usuario);
    $stmt->bindParam(':senha', sha1(md5($senha));

    if($stmt->execute()){
        echo "Usuário gerado com sucesso"; 
    }
    else{
        echo "Não foi possível gerar um usuário";
    }
?>