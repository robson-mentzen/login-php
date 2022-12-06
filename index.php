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

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
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