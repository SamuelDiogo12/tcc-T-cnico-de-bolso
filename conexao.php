<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "formulario";

// Criar a conexão
$conexao = new mysqli($servername, $username, $password, $database);

// Verificar a conexão
if ($conexao->connect_error) {
    echo("Conexão falhou: " . $conexao->connect_error);
}

?>