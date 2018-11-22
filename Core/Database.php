<?php

namespace Core;

use \PDO;

class Database
{

    private $pdo;

    public function getPDO()
    {
        if($this->pdo == null){
            $pdo = new PDO(
                'mysql:dbname=epitech_tp;
                host=localhost',
                'root',
                '');
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function prepare($statement, $attributes,  $return = false, $one = false)
    {
        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);
        if ($return)
        {
            if($one){
                return $req->fetch(PDO::FETCH_ASSOC);
            }
           return $req->fetchAll(PDO::FETCH_ASSOC);
        }
    }

}
