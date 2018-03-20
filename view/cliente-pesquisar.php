<?php
$titulo = "Pesquisa de clientes";
include 'cabecalho.php';?>
    <h1>Pesquisar clientes</h1>
    <br>
    <form class="form-inline" action="cliente-pesquisar.php" method="get">
        <div class="form-group">
            <label for="nome">Nome: </label>
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex.: Denagelles Debastiani" autofocus>
        </div>
        <button type="submit" class="btn btn-primary mb-2">
            <img src="../assets/images/ic_search_white_24px.svg" alt="Pesquisar">
            Pesquisar
        </button>
    </form>

<?php
include '../vendor/autoload.php';

$uDAO = new \App\DAO\UsuarioDAO();
$uDAO->verificar();


if (isset($_GET['msg']) && $_GET ['msg'] == 1)
    echo "<div class='alert alert-success'>Cliente excluído com sucesso!</div>";
if (isset($_GET['msg']) && $_GET ['msg'] == 2)
    echo "<div class='alert alert-success'>Cliente alterado com sucesso!</div>";

$c = new \App\Model\Cliente();
isset($_GET['nome']) ? $c->setNome($_GET['nome']) : $c->setNome("");

$cDAO = NEW \App\DAO\ClienteDAO();
$clientes = $cDAO->pesquisar($c);

if (count($clientes) > 0) {

    ?>

    <table class='table table-striped table-hover'>
        <tr class='text-center'>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th></th>
            <th></th>
        </tr>
        <?php

        foreach ($clientes as $cliente){
            echo "<tr class='text-center'>";
            echo  "<td> {$cliente->getId()}</td>";
            echo  "<td> {$cliente->getNome()}</td>";
            echo  "<td> {$cliente->getEndereco()}</td>";
            echo  "<td> {$cliente->getCpf()}</td>";
            echo  "<td> {$cliente->getTelefone()}</td>";
            echo  "<td><a class='btn btn-danger' href='cliente-excluir.php?id={$cliente->getId()}'>Excluir</a></td>";
            echo  "<td><a class='btn btn-warning' href='cliente-alterar.php?id={$cliente->getId ()}'>Alterar</a></td>";
            echo  "</tr>";



        }

        ?>
    </table>

    <?php
} else {
    echo "<div class='alert alert-danger'>Não existem clientes com a pesquisar informada!</div>";
}

include 'rodape.php';?>