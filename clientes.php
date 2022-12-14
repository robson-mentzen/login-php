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

    <body>
        <div class="container">
            <?php include('menu.php') ?>

            <div class="row">
                <div class="col-sm-12">
                    <form method="post" action="actions/actions.php?tipo=cliente">
                        <input type="hidden" class="form-control" name="id" value="<?php echo ($cliente != null ? $cliente['id'] : '') ?>">
                        <div class="row mb-3">
                            <div class="col-sm-6 col-md-6">
                                <input type="hidden" class="form-control" name="id" value="<?php echo ($cliente != null ? $cliente['id'] : '') ?>">
                                <label>Nome:</label>
                                <input type="text" class="form-control" name="nome" value="<?php echo ($cliente != null ? $cliente['nome'] : "") ?>">
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <label>E-mail:</label>
                                <input type="email" class="form-control" name="email" value="<?php echo ($cliente != null ? $cliente['email'] : "") ?>">
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <label>Telefone:</label>
                                <input type="text" class="form-control" name="telefone" value="<?php echo ($cliente != null ? $cliente['telefone'] : "") ?>">
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <label>Data de Nascimento:</label>
                                <input type="date" class="form-control" name="data_nascimento" value="<?php echo ($cliente != null ? $cliente['data_nascimento'] : "") ?>">
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <label>Cidade:</label>
                                <select class='form-control' name="id_cidade">
                                    <?php
                                    $stmt = $conexão->prepare("SELECT id, nome FROM cidades ORDER BY nome");
                                    $stmt->execute();
                                    echo "<option value='0'>SELECIONE...</option>";
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        if ($cliente != null && $cliente['id_cidade'] == $row['id']) {
                                            echo "<option selected values='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                                        } else {
                                            echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 col-md-4">
                            <input class="btn btn-secondary" value="Limpar" type="reset">
                            <button class="btn btn-primary" type="submit">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

</html>