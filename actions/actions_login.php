<?php
session_start();

//abrir uma conexão com o banco de dados
$conexao = require('../database/config.php');

$usuario = $_POST["usuario"]; //nome do formulário da requisição
$senha = $_POST["senha"]; //nome do formulário da requisição

$sql = " SELECT * FROM usuarios WHERE login = :login
            AND senha = md5(:senha) ";

$stmt = $conexao->prepare($sql);
$stmt->bindValue(":login", $usuario);
$stmt->bindValue(":senha", $senha);

$stmt->execute(); //executa o SQL com os parametros passados acima
$retorno = $stmt->fetch(PDO::FETCH_ASSOC); //armazena na variável retorno, os dados obtidos da consulta
if ($retorno) { //retorno está preenchido e não é falso?
    echo "Olá, " . $retorno["nome"] . "!";
    $_SESSION["erro"] = "";
} else {
    $_SESSION["erro"] = "Dados de acesso inválidos";
    header('Location: ../login.php'); //navega até a tela de login
}

//pegar os dados que vieram no formulário e testar se são válidos