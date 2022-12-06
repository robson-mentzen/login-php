<?php
session_start();

if (!isset($_SESSION['logado'])) {
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <?php include('components/js.php') ?>
    </head>

    <body>
        <?php include('database/menu.php') ?>

        <button class="btn btn-primary" onclick="confirmar_logout()">SAIR</button>
    </body>
</html>
