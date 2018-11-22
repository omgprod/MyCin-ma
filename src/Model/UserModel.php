<?php

namespace Src\Model;

use Core\Database;
use Core\Entity;

class UserModel extends Entity
{
    protected $model = "users";
    protected static $relations = ['hasMany' => 'historique_membre'];
    public function getRelations()
    {
        return self::$relations;
    }
}