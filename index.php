<?php
session_start();

if (!isset($_SESSION['logado'])) {
    header('Location: login.php');
}

echo "INDEX";

?>

<head>
    <?php include('components/js.php') ?>
</head>

<button onclick="confirmar_logout()">SAIR</button>