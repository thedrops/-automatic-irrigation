<?php

    // constantes com as credenciais de acesso ao banco MySQL
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'planta');

    // habilita todas as exibições de erros
    ini_set('display_errors', true);
    error_reporting(E_ALL);

    date_default_timezone_set('America/Sao_Paulo');


    //funcao conecta no mysql com PDO
    function db_connect()
    {
        $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

        return $PDO;
    }


?>
