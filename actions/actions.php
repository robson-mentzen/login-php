<?php
session_start();
//abrir uma conexão com o banco de dados
$conexao = require('../database/config.php');

//verifica se o tipo está definido
if(!isset($_GET['tipo'])){
    header('Location: ../index.php');
}

$tipo = $_GET['tipo'];

if($tipo == 'cliente'){

    $nome = $_POST["nome"];

    echo $nome;
}