<?php
include('include/header.php');
include('include/nav.php');
require_once 'painel-sql.php';

$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<h1 class='center'>Bem Vindo!<?php echo $user['nome_usuario'];?> </h1>

