<?php

//abrir uma conexão com o banco de dados
$conexao = require('../database/config.php');

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

$sql = " SELECT * FROM usuarios WHERE login = :login
            AND senha = md5(:senha) ";

$stmt = $conexao->prepare($sql);
$stmt->bindValue(":login", $usuario);
$stmt->bindValue(":senha", $senha);

$stmt->execute();
$retorno = $stmt->fetch(PDO::FETCH_ASSOC);
if ($retorno) {
    echo "Olá, " . $retorno["nome"] . "!";
} else {
    echo "Login Inválido";
}

//pegar os dados que vieram no formulário e testar se são válidos