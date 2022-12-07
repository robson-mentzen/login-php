<nav class="navbar navbar-expand-lg navbar-light" style="border-bottom-right-radius: 10px; border-bottom-left-radius: 10px; background-color: rgb(169, 169, 169)">
    <a class="navbar-brand" href="#">Minha Página</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php"> Menu <span class="sr-only">Página Atual</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="clientes_lista.php"> Clientes <span class="sr-only">Página Atual</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="pagina3.html"> <span class="sr-only">Página Atual</span></a>
            </li>
        </ul>
    </div>
</nav>

<?php
    if (isset($_SESSION['erro'])) {
        echo "<script>mensagem_erro('" . $_SESSION['erro'] . "')</script>";
        unset($_SESSION['erro']);
    }
    if (isset($_SESSION['sucesso'])) {
        echo "<script>mensagem_sucesso('" . $_SESSION['sucesso'] . "')</script>";
        unset($_SESSION['sucesso']);
    }
?>