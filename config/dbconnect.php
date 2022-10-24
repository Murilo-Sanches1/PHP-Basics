<?php

    $dbHost = "localhost";
    $dbUserName = "murilo";
    $dbPassword = "sanches";
    $dbName = "pizzas";

    $conn = mysqli_connect($dbHost, $dbUserName, $dbPassword, $dbName);

    if(!$conn){
        echo "<h1>Erro ao conectar com o banco de dados: (\"" . mysqli_connect_error() . "\")</h1>";
    };

?>