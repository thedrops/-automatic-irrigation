<?php
    require_once 'conexao.php';
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $nome = isset($_POST['nome_usuario']) ? $_POST['nome_usuario'] : null;
    $login = isset($_POST['nome_login']) ? $_POST['nome_login'] : null;
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : null;
    $senha =  isset($_POST['senha']) ? $_POST['senha'] : null;

    $senha = sha1(md5($senha));

    $PDO = db_connect();
    $sql = "INSERT INTO usuario(nome_usuario,login_usuario,email,endereco,senha) VALUES(:nome_usuario,:login_usuario,:email,:endereco,:senha)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome_usuario', $nome);
    $stmt->bindParam(':login_usuario', $login);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':endereco',$endereco);
    $stmt->bindParam(':senha', $senha);
    
    try{
        $stmt->execute();
        echo "sucesso";
    }catch(PDOException $e){
        echo  $e->getMessage();
    }

?>
