<?php
/**
 * Created by PhpStorm.
 * User: omg-p
 * Date: 27/09/2018
 * Time: 13:04
 */

namespace Src\Model;

use Core\Entity;

class ArticleModel extends Entity
{
    protected $model = 'comments';
    protected static $relations = ['hasMany' => 'articles','hasMany' => 'tags'];
    public function getRelations()
    {
        return self::$relations;
    }
}