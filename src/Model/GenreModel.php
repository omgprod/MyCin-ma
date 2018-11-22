<?php
/**
 * Created by PhpStorm.
 * User: omg-p
 * Date: 04/10/2018
 * Time: 14:38
 */

namespace src\Model;
use Core\Entity;


class GenreModel extends Entity
{
    protected $model = 'genre';
    protected static $relations = ['HasMany' => 'film'];
    public function getRelations()
    {
        return self::$relations;
    }
}