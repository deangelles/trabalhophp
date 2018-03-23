

<?php
$titulo = "Usúarios";
include 'cabecalho.php';?>

<h1>Cadastrar Usuário</h1>

<?php

include '../vendor/autoload.php';



if ($_POST){
    $c = new \App\Model\Usuario();
    $c->setEmail($_POST['email']);
    $c->setSenha($_POST['senha']);



    $cDAO = new \App\DAO\UsuarioDAO();
    if ($cDAO->inserir($c))
        echo "<div class='alert alert-success'>Usuário cadastrado com sucesso!</div>";
}

?>

<form action="usuario-inserir.php" method="post">
    <div class="form-group">
        <label for="email"><span class="text-danger">*</span> Email</label>
        <input type="text" id="email" name="email" class="form-control" autofocus required>
    </div>
    <div class="form-group">
        <label for="senha"><span class="text-danger">*</span> Senha</label>
        <input type="text" id="senha" name="senha" class="form-control" required>
    </div>

    <div class="form-group">
        Os campos com <span class="text-danger">*</span> não podem estar em branco.
    </div>
    <button type="submit" class="btn btn-success">
        <img src="../assets/images/ic_done_white_24px.svg" alt="Cadastrar o cliente"> Cadastrar
    </button>
</form>



<?php include 'rodape.php';?>