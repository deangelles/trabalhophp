<?php
/**
 * Created by PhpStorm.
 * User: 52971457249
 * Date: 08/03/2018
 * Time: 21:34
 */

namespace App\Helper;


class Senha
{
    static public function gerar($senha)
    {
        return md5($senha);
    }

}