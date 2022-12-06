<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header('Location: login.php');
}
?>


<!DOCTYPE html>
<html lang="pt-br">
    
    <head>
        <?php include('components/js.php') ?>
    </head>

    <body class="fundo">
        <div class="container">
            <?php include('menu.php')?>
            
            <div id="nav-menu"></div>
            <h1>Banco de Dados</h1>

            <button class="btn btn-danger" onclick="confirmar_logout()">SAIR</button>
        </div>
    </body>

</html>