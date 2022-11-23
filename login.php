<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>

        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        <form method="post" action="actions/actions_login.php">
            <div>
                <label>Usuário</label>
                <input type="text" id="usuario" name="usuario">
            </div>
            <div>
                <label>Senha</label>
                <input type="password" id="senha" name="senha">
            </div>

            <?php
                if (isset($_SESSION["ERROR"])) {
                    echo $_SESSION["erro"];
                }
            ?>

            <div>
                <input type="submit" id="logar" value="ENTRAR">
            </div>
        </form>
    </body>
</html>