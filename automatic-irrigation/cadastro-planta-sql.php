<?php
include('include/header.php');
include('include/nav.php');

    require_once 'conexao.php';

    //inicializar variáveis
    $nome_planta = isset($_POST['nome_planta']) ? $_POST['nome_planta'] : null;
    $nome_cientifico = isset($_POST['nome_cientifico']) ? $_POST['nome_cientifico'] : null;
    $umidade = isset($_POST['umidade']) ? $_POST['umidade'] : null;
    $temperatura = isset($_POST['temperatura']) ? $_POST['temperatura'] : null;

    //validação de campos nullos $_GET

    if(empty($nome_planta)){
            echo "1";
    }

     if(empty($nome_cientifico)){
            echo "2";
    }

 if(empty($umidade)){
            echo "3";
    }

 if(empty($temperatura)){
            echo "4";
    }

    if(empty($nome_planta) || empty($nome_cientifico) || empty($umidade) || empty($temperatura)){
        echo "campo vazio , volte e preencha todos os campos";
        exit;
    }

    //inserção de dados no banco
    $PDO = db_connect();
    $sql = "INSERT INTO plantas(nome_planta,nome_cientifico,umidade,temperatura) VALUES(:nome_planta,:nome_cientifico,:umidade,:temperatura)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome_planta', $nome_planta);
    $stmt->bindParam(':nome_cientifico', $nome_cientifico);
    $stmt->bindParam(':umidade',$umidade);
    $stmt->bindParam(':temperatura',$temperatura);

    if($stmt->execute()){
        echo "cadastro efetuado com sucesso";
        header('Location:consulta-planta.php');

    }
    else{
        echo "erro no cadastro de planta";
    }
?>
