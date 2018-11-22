<?php
/**
 * Created by PhpStorm.
 * User: omg-p
 * Date: 04/10/2018
 * Time: 20:43
 */

namespace Src\Model;

class HistoriqueModel
{
    protected $model = 'historique';
    protected static $relations = ['hasOne' => 'film'];
    public function getRelations()
    {
        return self::$relations;
    }
}