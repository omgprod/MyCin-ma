<?php
/**
 * Created by PhpStorm.
 * User: omg-p
 * Date: 27/09/2018
 * Time: 13:05
 */

namespace src\Model;

use Core\Entity;

class TagModel extends Entity
{
    protected $model = 'comments';
    protected static $relations = ['hasMany' => 'articles'];
    public function getRelations()
    {
        return self::$relations;
    }
}