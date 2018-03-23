<?php
/**
 * Created by PhpStorm.
 * User: 52971457249
 * Date: 08/03/2018
 * Time: 21:20
 */

namespace App\DAO;


class UsuarioDAO extends Conexao
{
    public function  login($usuario)
    {
        $sql = "select * from usuarios where email = :email and senha= :senha";
        try{
            $p = $this->conexao->prepare($sql);
            $p->bindValue(":email",$usuario->getEmail());
            $p->bindValue(":senha",\App\Helper\Senha::gerar($usuario->getSenha()));
            $p->execute();
            $resultado = $p->fetch();
            session_start();
            $_SESSION['id'] = $resultado['id'];
            return $resultado;
        }catch (\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function consulta($usuario){
        $sql = " select * from usuarios where id= :id";
        try{
            $p = $this->conexao->prepare($sql);
            $p->bindValue(":id", $usuario->getId());

            $p->execute();
            $resultado = $p->fetch();

            return $resultado;

        }catch (\PDOException $e){
            echo $e->getMessage();
        }

    }
    public function alterarUser($usuario){
        $sql = " update usuarios set email= :email, senha= :senha where id= :id";
        try{
            $p = $this->conexao->prepare($sql);
            $p->bindValue(":email", $usuario->getEmail());
            $p->bindValue(":senha", \App\Helper\Senha::gerar($usuario->getSenha()));
            $p->bindValue(":id", $usuario->getId());

            $p->execute();
            return true;

        }catch (\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function inserir($usuario)
    {
        $sql = "insert into usuarios (email,senha)VALUES ( :email, :senha)";
        try{
            $in = $this->conexao->prepare($sql);
            $in->bindValue(":email",$usuario->getEmail());
            $in->bindValue(":senha",\App\Helper\Senha::gerar($usuario->getSenha()));
            $in->execute();
            return true;
        } catch (\PDOException $exception){
            echo "<div class='alert alert-danger'>{$exception->getMessage()}</div>";
        }
    }

    public function logoff()
    {
        session_start();
        unset($_SESSION['id']);
        session_destroy();
        header("Location: login.php");
    }
    public function verificar()
    {
        session_start();
        if (empty($_SESSION['id']))
            header("Location: login.php");
    }
}