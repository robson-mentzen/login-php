<?php
session_start();
//abrir uma conexão com o banco de dados
$conexao = require('../database/config.php');

$tabela = $_GET["tabela"];
$chave = $_GET["chave"];

$sql = "UPDATE ". $tabela ." SET excluído = true WHERE id = ?";
$stmt = $conexão->prepare($sql);
$return = $stmt->execute([$chave]);

if ($return) {
    $_SESSION['sucesso'] = "Registro excluído com sucesso!";
    header('Location: ../index.php');
    exit();
}