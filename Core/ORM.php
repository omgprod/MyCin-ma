<?php

namespace Core;

use Src\Entity\FilmEntity;
use Core\Database;

class ORM
{
    private $db;

    public function __construct()
    {
        if (is_null($this->db)) {
            $this->db = new Database();
        }
    }

    public function create($table, $fields)
    {
        if ($table == 'genre') {
            $req = $this->db->getPDO()->query("INSERT INTO {$table} (nom) VALUES ('{$fields}')");
        } else {
            $key = implode(',', array_keys($fields));
            $val = "";
            foreach ($fields as $value) {
                $val .= "'{$value}', ";
            }
            $val = substr($val, 0, -2);
            $query = "INSERT INTO {$table} ({$key}) VALUES ({$val})";
            $req = $this->db->getPDO()->query($query);
        }
        if ($req) {
            return true;
        } else {
            return false;
        }

    }

    public function read($table, $id, $relation = []){
            $res = "SELECT * FROM {$table}";
            foreach ($relation as $relations) {
                if ($relations == 'historique_membre' && $relations == 'film') {
                    $res .= " LEFT JOIN {$relations} ON {$table}.id_film = {$relations}.id_film";
                } elseif ($relations == 'historique_membre') {
                    $res .= " LEFT JOIN {$relations} 
                              ON {$table}.id_user = {$relations}.id_membre";
                } elseif ($relations == 'genre') {
                    $res .= " LEFT JOIN {$relations} 
                              ON {$table}.id_{$relations} = {$relations}.id_{$relations}";
                } else {
                    $res .= " LEFT JOIN {$relations} 
                            ON {$table}.id_{$relations} = {$relations}.id_{$relations}";
                }
            } if ($table == "historique_membre") {
                $res .= " WHERE {$table}.id_film = {$id}";
            } else {
                $res .= " WHERE {$table}.id_{$table} = {$id}";
            }
            return $this->db->getPDO()
                ->query($res)
                ->fetchAll();
    }

    public function readSimple($table, $id){
        if ($table == "film") {
            $res =  "SELECT * FROM {$table} WHERE id_{$table} = {$id}";
                $this->db->getPDO()
                ->query($res)
                ->fetch();
            if (!empty($res)){
                return $res;
            } else {
                return false;
            }
        } elseif ($table == "genre") {
            $res = "SELECT * FROM {$table} WHERE nom = '{$id}'";
            return $this->db->getPDO()
                ->query($res)
                ->fetch();
        }
    }

    public function update($table, $id, $fields){
        if (!empty($fields[0]) && empty($fields[1]) ) {
            return $req = $this->db->getPDO()->query("UPDATE {$table} 
                                                        SET nom = '{$fields}' 
                                                        WHERE id_{$table} = {$id}");
        } elseif (!empty($fields[1])) {
            $field = "";
            foreach ($fields as $key => $value) {
                $v = filter_var($value, FILTER_SANITIZE_STRING);
                $field .= "{$key} = '{$v}',";
            } $field = rtrim($field, ',');
            if ($table == "genre") {
                $req = $this->db->getPDO()->query("UPDATE {$table} 
                                                        SET nom = '{$fields}' 
                                                        WHERE id_{$table} = {$id}");
            } else {
                $req = $this->db->getPDO()->query("UPDATE {$table} SET {$field}
                                                        WHERE id_{$table} = {$id}");
            }
        } if ($req) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($table, $id)
    {
        if ($table === 'historique_membre') {
            $req = $this->db->getPDO()
                ->query("DELETE FROM {$table} 
                                  WHERE id_film = {$id} 
                                  AND id_membre = {$_SESSION['users']['id_user']}");
        } else {
            $req = $this->db->getPDO()
                ->query("DELETE FROM {$table} 
                                  WHERE id_{$table} = {$id}");
        }
        if ($req) {
            return true;
        } else {
            return false;
        }
    }

    public function find($table, $params = array(), $one = false)
    {
        $cond = '';
        if (!empty($params)) {
            $cond .= "WHERE";
            foreach ($params as $key => $val) {
                $cond .= " {$key} '{$val}'";
            }
        }
        $req = $this->db->getPDO()->query("SELECT * FROM {$table} {$cond}");
        if ($one) {
            return $req->fetch();
        } else {
            return $req->fetchAll();
        }
    }

    public function readAll($table)
    {
        $req = $this->db->getPDO()->query("SELECT * FROM {$table}");
        return $req->fetchAll();

    }

    public function insert($table, $id)
    {
        $res = "SELECT * FROM {$table} WHERE titre = '{$id}'";
        return $this->db->getPDO()
            ->query($res)
            ->fetch();

    }
}