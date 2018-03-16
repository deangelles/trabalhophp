<?php
/**
 * Created by PhpStorm.
 * User: 52971457249
 * Date: 08/03/2018
 * Time: 21:21
 */

namespace App\DAO;


class ClienteDAO
{
    public function inserir($cliente)
    {
        $sql = "insert into cliente (id,nome,endereco,cpf,telefone)VALUES (:id, :nome, :endereco, :cpf, :telefone)";
        try{
            $i = $this->conexao->prepare($sql);
        }
    }

}