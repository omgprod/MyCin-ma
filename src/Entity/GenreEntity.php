<?php
/**
 * Created by PhpStorm.
 * User: omg-p
 * Date: 04/10/2018
 * Time: 14:42
 */

namespace src\Entity;

use Core\Entity;
use src\Model\GenreModel;


class GenreEntity extends Entity
{
    protected static $relations;
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $genre = new GenreModel();
        self::$relations = $genre->getRelations();
    }

    public function create($fields)
    {
        $this->orm->create('genre',$fields);
    }

    public function show()
    {
        return $this->orm->find('genre');
    }

    public function update($id, $fields)
    {
        return $this->orm->update('genre',$id,$fields);
    }

    public function delete($id)
    {
        return $this->orm->delete('genre',$id);
    }

    public function detail($id)
    {
        return $this->orm->read('genre',$id,self::$relations);
    }

    public function verif($id)
    {
        return $this->orm->readSimple('genre',$id);
    }

}