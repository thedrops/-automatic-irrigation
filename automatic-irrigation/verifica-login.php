<?php
    require_once 'conexao.php';

    //pega informação
    $login = isset($_POST['login']) ? $_POST['login'] : null;
    $senha = isset($_POST['senha']) ? $_POST['senha'] : null;

    echo($login);
    //valida campos
    if(empty($login)){
        echo "Preencha o campo do login";
        exit;
    }
    if(empty($senha)){
        echo "Preencha a senha";
        exit;
    }

    //tornando a senha em um hash 
    $senha = sha1(md5($senha));
  

    //pesquisa no banco se a informação está correta
    $PDO = db_connect();
    $sql = "SELECT * FROM usuario WHERE login_usuario= :usuario AND senha= :senha";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':usuario', $login);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
    if (count($users) == 0)
    {
        echo "Login ou senha incorretos";
        exit;
    }
    
    
    // pega o primeiro usuário
    $user = $users[0];
    
    //inicia sessão
    session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION['user_name'] = $user['id'];
    echo "Logado!";

    header("Location:index.php");

?>
