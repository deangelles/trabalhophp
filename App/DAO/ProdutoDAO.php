<?php
/**
 * Created by PhpStorm.
 * User: 52971457249
 * Date: 08/03/2018
 * Time: 21:19
 */

namespace App\DAO;


class ProdutoDAO extends Conexao

{
    public function inserir ($produto)
    {
        $sql = "insert into produtos (descricao, quantidade, valor, marca, validade)VALUES ( :descricao, :quantidade, :valor, :marca, :validade)";
        try{
            $in = $this->conexao->prepare($sql);
            $in->bindValue(":descricao",$produto->getDescricao());
            $in->bindValue(":quantidade",$produto->getQuantidade());
            $in->bindValue(":valor",$produto->getValor());
            $in->bindValue(":marca",$produto->getMarca());
            $in->bindValue(":validade",$produto->getValidade());
            $in->execute();
            return true;
        } catch (\PDOException $exception){
            echo "<div class='alert alert-danger'>{$exception->getMessage()}</div>";
        }
    }

    public function pesquisar($produto=null)
    {
        $sql = "select * from produtos where descricao like :descricao";
        try {
            $pes = $this->conexao->prepare($sql);
            $pes->bindValue(":descricao","%". $produto->getDescricao()."%");
            $pes->execute();
            return $pes->fetchAll(\PDO::FETCH_CLASS,"\App\Model\Produto");

        } catch (\PDOException $exception){
            echo  "<div class = 'alert alert-danger'>";
            $exception->getMessage();
        }
    }

    public  function excluir ($produto)
    {
        $sql = "delete from produtos where id = :id";
        try {
            $i = $this->conexao->prepare($sql);
            $i->bindValue(":id", $produto->getId());
            $i->execute();
            return true;
        } catch (\PDOException $exception) {
            echo "<div class='alert alert-danger'>{$exception->getMessage()}</div>";
        }
    }

    public function pesquisarUM($produto)
    {
        $sql = "Select * from  produtos where id = :id" ;
        try {
            $p = $this->conexao->prepare($sql);
            $p->bindValue("id", $produto->getId());
            $p->execute();
            return $p->fetch(\PDO::FETCH_ASSOC);

        }   catch (\PDOException $exception){
            echo "<div class='alert alert-danger'>{$exception->getMessage()}</div>";
        }
    }

    public function alterar($produto)
    {
        $sql = "update produtos set descricao = :descricao, quantidade = :quantidade, valor = :valor,marca = :marca, validade = :validade where id = :id";
        try {
            $i = $this->conexao->prepare($sql);
            $i->bindValue(":id",$produto->getId());
            $i->bindValue(":descricao",$produto->getDescicao());
            $i->bindValue(":quantidade",$produto->getQuantidade());
            $i->bindValue(":valor",$produto->getValor());
            $i->bindValue( "marca",$produto->getMarca());
            $i->bindValue(":validade",$produto->getValidade());
            $i->execute();
            return true;
        }   catch (\PDOException $e) {
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }


}
