<?php
/**
 * Created by PhpStorm.
 * User: 52971457249
 * Date: 08/03/2018
 * Time: 21:33
 */
namespace App\Helper;

class Moeda
{
    static public function get($valor)
    {
        return number_format($valor,2,',','.');
    }
    static public function set($valor)
    {
        return str_replace(',','.',str_replace('.','',$valor));
    }
}