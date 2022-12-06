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

    if(!isset($nome) || $nome == ''){
        $_SESSION['erro'] = "Informe um nome para o cliente":
        header('location: ../clientes.php');
        exit();
    }

    $sql = "INSERT INTO clientes (nome) VALUES(?)";
    $stmt = $conexao->prepare($sql);
    $return = $stmt->execute([$nome]);

    if ($return){
        $_SESSION['sucesso'] = "Cliente incluído com sucesso!";
        header('location: ../clientes_lista.php');
        exit();
    }
}