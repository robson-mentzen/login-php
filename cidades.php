<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header('Location: login.php');
}

//abrir uma conexão com o banco de dados
$conexao = require('database/config.php');

$cidade = null;
if (isset($_GET["id"])) { //isset = Verifica se existe o parametro ID na URL

    $id = $_GET['id'];

    $sql = "SELECT * FROM cidades WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":id", $id);

    $stmt->execute();
    $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($retorno) {
        $cidade = $retorno;
    }
}
?>


<!DOCTYPE html>
<html>

    <head>
        <meta charset=”UTF-8”>
        <title> Cidades </title>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        <?php include('components/js.php') ?>
    </head>

    <body>
        <div class="container">
            <?php include('menu.php') ?>

            <div class="row">
                <div class="col-sm-12">
                    <form method="post" action="actions/actions.php?tipo=cidade">
                        <input type="hidden" class="form-control" name="id" value="<?php echo ($cidade != null ? $cidade['id'] : '') ?>">
                        <div class="row mb-3">
                            <div class="col-sm-6 col-md-6">
                                <label>Cidade:</label>
                                <input type="text" class="form-control" name="nome" value="<?php echo ($cidade != null ? $cidade['nome'] : "") ?>">
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <label>Sigla do Estado:</label>
                                <input type="text" class="form-control" name="sigla_estado" value="<?php echo ($cidade != null ? $cidade['sigla_estado'] : "") ?>">
                            </div>
                        </div>
                        
                        <div class="col-sm-6 col-md-6">
                            <input class="btn btn-secondary" value="Limpar" type="reset">
                            <button class="btn btn-primary" type="submit">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

</html>