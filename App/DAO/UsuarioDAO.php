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
    public function logooff()
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