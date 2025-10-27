<?php
// Configuração da conexão com o banco de dados MySQL

$servername = "localhost"; // nome do servidor do banco de dados (localmente localhost)
$username = "root"; // Usuário do bando de dados
$password = "Senai@118"; // Senha do banco de dados (vazia no XAMPP padrão)
$dbname = "VidaSemFome"; // nome do banco de dados

// Criar a conexão do banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar se há erros na conexão
if ($conn->connect_error){
    die("Falha na conexão" . $conn->connect_error);
}

// Definição do charset para evitar problemas com acentuação
$conn->set_charset("utf8");
?>