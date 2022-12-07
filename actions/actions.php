<?php
session_start();
//abrir uma conexão com o banco de dados
$conexao = require('../database/config.php');

//verifica se o tipo não está definido
if (isset($_GET['tipo']) == false) {
    header('Location: ../index.php');
    exit();
}

$tipo = $_GET['tipo'];

//cadastro de clientes
if ($tipo == 'cliente') {

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    if (!isset($nome) || $nome == '') {
        $_SESSION['erro'] = "Informe um nome para o cliente";
        header('Location: ../clientes.php');
        exit();
    }

    if (!isset($email) || $email == '') {
        $_SESSION['erro'] = "Informe um email para o cliente";
        header('Location: ../clientes.php');
        exit();
    }

    if (isset($id) && $id != '') {
        $sql = "UPDATE clientes SET nome = ?, email = ? WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $return = $stmt->execute([$nome, $email, $id]);

        if ($return) {
            $_SESSION['sucesso'] = "Cliente alterado com sucesso!";
            header('Location: ../clientes-lista.php');
            exit();
        }
    } else {
        $sql = "INSERT INTO clientes (nome, email) VALUES(?,?)";
        $stmt = $conexao->prepare($sql);
        $return = $stmt->execute([$nome]);

        if ($return) {
            $_SESSION['sucesso'] = "Cliente incluído com sucesso!";
            header('Location: ../clientes-lista.php');
            exit();
        }
    } 

} else {
    header('Location: ../index.php');
    exit();
}