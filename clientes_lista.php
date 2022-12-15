<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header('Location: login.php');
}

//abrir uma conexão com o banco de dados
$conexao = require('database/config.php');
?>


<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        <?php include('components/js.php')?>
    </head>

    <body>
        <div class="container">
            <?php include('menu.php') ?>
            <div id="nav-menu"></div>
            <h2>Clientes:</h2>

            <div class="row">
                <div class="col-md-12">

                <a class='btn btn-block btn-primary' href='clientes.php'>Novo Cliente</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Cidade</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $stmt = $conexao ->prepare("SELECT cli.id, cli.email, cli.nome, c.nome as cidade 
                                                            FROM clientes cli, cidades c 
                                                            WHERE cli.id_cidade = c.id");
                                $stmt -> execute();
                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    echo "<tr>
                                            <td>" . $row['nome'] . "</td>
                                            <td>" . $row['email'] . "</td>
                                            <td>" . $row['cidade'] . "</td>
                                            <td> 
                                                <a class='btn btn-md btn-success'
                                                href='clientes.php?id=". $row['id'] . "'>
                                                <i class='fa fa-edit'></i></a>
                                                <a class='btn btn-md btn-danger'
                                                href='actions/delete.php?chave=" . $row['id'] . "&tabela=clientes'>
                                                <i class='fa fa-trash'></i></a>
                                            </td>
                                        </tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
    </body>
    
</html>