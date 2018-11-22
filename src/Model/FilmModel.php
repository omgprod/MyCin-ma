<?php
/**
 * Created by PhpStorm.
 * User: omg-p
 * Date: 03/10/2018
 * Time: 20:34
 */

namespace src\Model;
use Core\Entity;

class FilmModel extends Entity
{
    protected $model = 'film';
    protected static $relations = ['hasOne' => 'Genre'];
    public function getRelations()
    {
        return self::$relations;
    }
}