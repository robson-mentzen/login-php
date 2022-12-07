<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header('Location: login.php');
}

//abrir uma conexão com o banco de dados
$conexao = require('database/config.php');

$cliente = null;
if (isset($_GET["id"])) { //isset = Verifica se existe o parametro ID na URL

    $id = $_GET['id'];

    $sql = "SELECT * FROM clientes WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":id", $id);

    $stmt->execute();
    $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($retorno) {
        $cliente = $retorno;
    }
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
            <form method="post" action="actions/actions.php?tipo=cliente">
                <div class="row">
                    <div class="col-md-4">
                        <form method="post" action="actions/actions.php?tipo=cliente">

                            <input type="hidden" class="form-control" name="id" value="<?php echo ($cliente != null ? $cliente['id'] : '') ?>">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="nome" value="<?php echo ($cliente != null ? $cliente['nome'] : "") ?>">
                        </form>
                    </div>

                    <div class="col-md-8">
                        <form method="post" action="actions/actions.php?tipo=cliente">

                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo ($cliente != null ? $cliente['email'] : "") ?>">
                        </form>
                    </div>

                    <div class="col-md-6">
                        <form method="post" action="actions/actions.php?tipo=cliente">
                            <button class="btn btn-secondary" type="reset">Limpar</button>
                            <button class="btn btn-primary" type="submit">Salvar</button>
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </body>

</html>