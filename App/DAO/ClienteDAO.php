<?php
/**
 * Created by PhpStorm.
 * User: 52971457249
 * Date: 08/03/2018
 * Time: 21:21
 */

namespace App\DAO;


class ClienteDAO extends Conexao
{
    public function inserir($cliente)
    {
        $sql = "insert into cliente (nome,endereco,cpf,telefone)VALUES ( :nome, :endereco, :cpf, :telefone)";
        try{
            $in = $this->conexao->prepare($sql);
            $in->bindValue(":nome",$cliente->getNome());
            $in->bindValue(":endereco",$cliente->getEndereco());
            $in->bindValue(":cpf",$cliente->getCpf());
            $in->bindValue(":telefone",$cliente->getTelefone());
            $in->execute();
            return true;
        } catch (\PDOException $exception){
            echo "<div class='alert alert-danger'>{$exception->getMessage()}</div>";
        }
    }

    public function pesquisar($cliente=null)
    {
        $sql = "select * from cliente where nome like :nome";
        try {
            $pes = $this->conexao->prepare($sql);
            $pes->bindValue(":nome","%". $cliente->getNome()."%");
            $pes->execute();
            return $pes->fetchAll(\PDO::FETCH_CLASS,"\App\Model\Cliente");

        } catch (\PDOException $exception){
            echo  "<div class = 'alert alert-danger'>";
            $exception->getMessage();
        }
    }

    public  function excluir ($cliente)
    {
        $sql = "delete from cliente where id = :id";
        try {
            $i = $this->conexao->prepare($sql);
            $i->bindValue(":id", $cliente->getId());
            $i->execute();
            return true;
        } catch (\PDOException $exception) {
            echo "<div class='alert alert-danger'>{$exception->getMessage()}</div>";
        }
    }

    public function pesquisarUM($cliente)
    {
        $sql = "Select * from  cliente where id = :id" ;
        try {
            $p = $this->conexao->prepare($sql);
            $p->bindValue("id", $cliente->getId());
            $p->execute();
            return $p->fetch(\PDO::FETCH_ASSOC);

        }   catch (\PDOException $exception){
            echo "<div class='alert alert-danger'>{$exception->getMessage()}</div>";
        }
    }

    public function alterar($cliente)
    {
        $sql = "update cliente set nome = :nome, endereco = :endereco, cpf = :cpf, telefone = :telefone where id = :id";
        try {
            $i = $this->conexao->cliente($sql);
            $i->bindValue(":id",$cliente->getId());
            $i->bindValue(":nome",$cliente->getNome());
            $i->bindValue(":endereco",$cliente->getEndereco());
            $i->bindValue(":cpf",$cliente->getCpf());
            $i->bindValue(":telefone",$cliente->getTelefone());
            $i->execute();
            return true;
        }   catch (\PDOException $e) {
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }





}