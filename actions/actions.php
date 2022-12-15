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
    $telefone = $_POST["telefone"];
    $data_nascimento = $_POST["data_nascimento"];
    $id_cidade = $_POST["id_cidade"];


    if (!isset($nome) || $nome == '') {
        $_SESSION['erro'] = "Informe um nome para o cliente";
        header('Location: ../clientes.php');
        exit();
    }

    if (!isset($email) || $email == '') {
        $_SESSION['erro'] = "Informe um e-mail para o cliente";
        header('Location: ../clientes.php');
        exit();
    }

    if (!isset($telefone) || $telefone == '') {
        $_SESSION['erro'] = "Informe um telefone para o cliente";
        header('Location: ../clientes.php');
        exit();
    }

    if (!isset($data_nascimento) || $data_nascimento == '') {
        $_SESSION['erro'] = "Informe uma data de nascimento para o cliente";
        header('Location: ../clientes.php');
        exit();
    }

    if (isset($id) && $id != '') {
        $sql = "UPDATE clientes SET nome = ?, email = ?, telefone = ?, data_nascimento = ?, id_cidade = ? WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $return = $stmt->execute([$nome, $email, $telefone, $data_nascimento, $id_cidade, $id]);

        if ($return) {
            $_SESSION['sucesso'] = "Cliente alterado com sucesso!";
            header('Location: ../clientes_lista.php');
            exit();
        }
    } else {
        $sql = "INSERT INTO clientes (nome, email, telefone, data_nascimento, id_cidade) VALUES(?,?,?,?,?)";
        $stmt = $conexao->prepare($sql);
        $return = $stmt->execute([$nome, $email, $telefone, $data_nascimento, $id_cidade]);

        if ($return) {
            $_SESSION['sucesso'] = "Cliente incluído com sucesso!";
            header('Location: ../clientes_lista.php');
            exit();
        }
    }

} else if ($tipo == 'cidade') {

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $sigla_estado = $_POST["sigla_estado"];

    if (!isset($nome) || $nome == '') {
        $_SESSION['erro'] = "Informe o nome da cidade";
        header('Location: ../cidades.php');
        exit();
    }

    if (!isset($sigla_estado) || $sigla_estado == '') {
        $_SESSION['erro'] = "Informe a UF do estado";
        header('Location: ../cidades.php');
        exit();
    }

    if (isset($id) && $id != '') {
        $sql = "UPDATE cidades SET nome = ?, sigla_estado = ? WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $return = $stmt->execute([$nome, $sigla_estado, $id]);

        if ($return) {
            $_SESSION['sucesso'] = "Cidade alterada com sucesso!";
            header('Location: ../cidades_lista.php');
            exit();
        }
    } else {
        $sql = "INSERT INTO cidades (nome, sigla_estado) VALUES(?,?)";
        $stmt = $conexao->prepare($sql);
        $return = $stmt->execute([$nome, $sigla_estado]);

        if ($return) {
            $_SESSION['sucesso'] = "Cidade incluída com sucesso!";
            header('Location: ../cidades_lista.php');
            exit();
        }
    }

} else {
    header('Location: ../index.php');
    exit();
}