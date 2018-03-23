<?php
$titulo = "Cadastro de cliente";
include 'cabecalho.php';?>
    <h1>Cadastrar novo cliente</h1>

<?php

include '../vendor/autoload.php';

$uDAO = new \App\DAO\UsuarioDAO();
$uDAO->verificar();

if ($_POST){
    $c = new \App\Model\Cliente();
    $c->setNome($_POST['nome']);
    $c->setEndereco($_POST['endereco']);
    $c->setCpf($_POST['cpf']);
    $c->setTelefone($_POST['telefone']);



    $cDAO = new \App\DAO\ClienteDAO();
    if ($cDAO->inserir($c))
        echo "<div id='mensagem' class='alert alert-success'>Cliente cadastrado com sucesso!</div>";

}

?>
     <script>
        setTimeout(function(){
            desaparecerImagem();}, 3000);
        function desaparecerImagem(){
            var mensagem = document.querySelector("#mensagem");
            mensagem.style.display = "none";
        }

     </script>

    <form action="cliente-inserir.php" method="post">
        <div class="form-group">
            <label for="nome"><span class="text-danger">*</span> Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" autofocus required>
        </div>
        <div class="form-group">
            <label for="endereco"><span class="text-danger">*</span> Endereço</label>
            <input type="text" id="endereco" name="endereco" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" id="cpf" name="cpf" class="form-control">
        </div>
        <div class="form-group">
            <label for="telefone"><span class="text-danger">*</span> Telefone</label>
            <input type="text" id="telefone" name="telefone" class="form-control" autofocus required>
        </div>
        <div class="form-group">
            Os campos com <span class="text-danger">*</span> não podem estar em branco.
        </div>
        <button type="submit" class="btn btn-success">
            <img src="../assets/images/ic_done_white_24px.svg" alt="Cadastrar o cliente"> Cadastrar
        </button>
    </form>
<?php include 'rodape.php';?>