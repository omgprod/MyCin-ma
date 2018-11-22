<?php

namespace Core;

class Entity {

    protected $model;
    protected $orm;
    protected $params;
    protected static $relations;

    public function __construct($params = [])
    {
        $this->orm = new ORM();
        $this->params = $params;
    }

    public function hasMany($table)
    {
        self::$relations["has many"][] = $table;
    }

    public function hasOne($table)
    {
        self::$relations["has one"][] =  $table;
    }
}