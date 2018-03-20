<?php
$titulo = "Alteração de Clientes";
include 'cabecalho.php';?>
    <h1>Alterar cliente</h1>

<?php

include '../vendor/autoload.php';

$uDAO = new \App\DAO\UsuarioDAO();
$uDAO->verificar();

if($_POST){
    $c2 = new \App\Model\cliente();
    $c2->setId($_POST['id']);
    $c2->setNome($_POST['nome']);
    $c2->setEndereco($_POST['endereco']);
    $c2->setCpf($_POST['cpf']);
    $c2->setTelefone($_POST['telefone']);



    $c2DAO = new \App\DAO\ClienteDAO();
    if ($c2DAO->alterar($c2))
        header("Location: cliente-pesquisar.php?msg=2");

}


$c = new \App\Model\Cliente();
isset($_GET) ? $c->setId($_GET['id']) : $c->setId($_POST['id']);

$cDAO = new \App\DAO\ClienteDAO();
$resultado = $cDAO->pesquisarUm($c);

?>

    <form action="cliente-alterar.php" method="post">
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" id="id" name="id" class="form-control" value="<?php echo $resultado['id']; ?>">
        </div>
        <div class="form-group">
            <label for="nome"><span class="text-danger">*</span> Nome</label>
            <input type="text" id="nome" name="descricao" required autofocus class="form-control"value="<?php echo $resultado['nome']; ?>">
        </div>
        <div class="form-group">
            <label for="endereco"><span class="text-danger">*</span> Endereço</label>
            <input type="text" id="endereco" name="endereco" required class="form-control"value="<?php echo ($resultado['endereco']); ?>">
        </div>
        <div class="form-group">
            <l<label for="cpf"><span class="text-danger">*</span> CPF</label>
            <input type="text" id="cpf" name="cpf" class="form-control"value="<?php echo \App\Helper\Moeda::get($resultado['cpf']); ?>">
        </div>
        <div class="form-group">
            <label for="telefone"><span class="text-danger">*</span> Telefone</label>
            <input type="text" id="telefone" name="telefone" required autofocus class="form-control"value="<?php echo \App\Helper\Moeda::get ($resultado['telefone']); ?>">
        </div>
        <div class="form-group">
            Os campos com <span class="text-danger">*</span> não podem estar em branco.
        </div>
        <button type="submit" class="btn btn-success">
            <img src="../assets/images/ic_done_white_24px.svg" alt="Alterar o cliente"> Alterar
        </button>
    </form>
<?php include 'rodape.php';?>