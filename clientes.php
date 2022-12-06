<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header('Location: login.php');
}
$conexao = require('database/config.php');

$cliente = null;
if (isset($_GET["id"])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM clientes WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":id", $id);

    $stmt->execute();
    $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($retorno) {
        $cliente = $retorno;
        $email = $retorno;
    };
}
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset=”UTF-8”>
        <title> Clientes </title>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        <?php include('components/js.php') ?>
    </head>

    <body class="fundo">
        <div class="container">
            <?php include('menu.php') ?>
            <form>
                <div class="row">
                    <div class="col-md-4">
                        <label>Nome</label>
                        <input type="text" class="form-control" value="<?php echo ($cliente != null ? $cliente['nome'] : "") ?>">
                    </div>
                    <div class="col-md-8">
                        <label>Email</label>
                        <input type="text" class="form-control" value="<?php echo ($cliente != null ? $cliente['email'] : "") ?>">
                    </div>
                </div>
            </form>
        </div>
    </body>

</html>