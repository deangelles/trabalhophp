<?php


include  '../vendor/autoload.php';

$uDAO = new \App\DAO\UsuarioDAO();
$uDAO->verificar();

$c = new \App\Model\Cliente();
$c->setId($_GET['id']);

$cDAO = new \App\DAO\ClienteDAO();
if ($cDAO->excluir($c))
    header("Location:cliente-pesquisar.php?msg=1");