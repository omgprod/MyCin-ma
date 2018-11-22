<?php
/**
 * Created by PhpStorm.
 * User: omg-p
 * Date: 07/10/2018
 * Time: 23:19
 */

namespace src\Model;

use Core\Entity;

class ChatModel extends Entity
{
    protected $model = 'chat';
    protected static $relations = ['hasOne' => 'message'];
    public function getRelations()
    {
        return self::$relations;
    }
}