<?php
    require_once 'conexao.php';
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $nome = isset($_POST['nome_usuario']) ? $_POST['nome_usuario'] : null;
    $login = isset($_POST['nome_login']) ? $_POST['nome_usuario'] : null;
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : null;
    $senha = sprintf('%07X', mt_rand(0, 0xFFFFFFF));
    $senha = sha1(md5($senha));
    if(empty($login)){
        echo "Informe o usuário";
        exit;
    }

    $PDO = db_connect();
    $sql = "INSERT INTO usuario(nome_usuario,login_usuario,email,endereco,senha) VALUES(:nome_usuario,:login_usuario,:email,:endereco,:senha)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome_usuario', $nome);
    $stmt->bindParam(':login_usuario', $login);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':endereco',$endereco);
    $stmt->bindParam(':senha', $senha);

    if($stmt->execute()){
        echo "Usuário gerado com sucesso"; 
    }
    else{
        echo "Não foi possível gerar um usuário";
    }
?>
