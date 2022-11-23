<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Login</title>

        <?php include('components/js.php') ?>
   </head>

    <body>
        <form method="post" action="actions/actions_login.php">
            <div>
                <label>Usuário:</label>
                <input type="text" id="usuario" name="usuario">
            </div>
            <div>
                <label>Senha:</label>
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