<?php
session_start();
//abrir uma conexão com o banco de dados
$conexao = require('../database/config.php');

$tabela = $_GET["tabela"];
$chave = $_GET["chave"];

$sql = "DELETE FROM ". $tabela ." WHERE id = ?";
$stmt = $conexao->prepare($sql);
$return = $stmt->execute([$chave]);

if ($return) {
    $_SESSION['sucesso'] = "Registro excluído com sucesso!";
    header('Location: ../clientes_lista.php');
    exit();
}