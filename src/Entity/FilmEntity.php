<?php
/**
 * Created by PhpStorm.
 * User: omg-p
 * Date: 03/10/2018
 * Time: 20:33
 */

namespace src\Entity;

use Core\Entity;
use src\Model\FilmModel;

class FilmEntity extends Entity
{

    protected static $relations;

    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $film = new FilmModel();
        self::$relations = $film->getRelations();
    }

    public function show()
    {
        return $this->orm->find('film');
    }

    public function detail($id)
    {
        return $this->orm->read('film',$id,self::$relations);
    }

    public function create($fields)
    {
         $this->orm->create('film', $fields);
    }

    public function update($id, $fields)
    {
        return $this->orm->update('film',$id,$fields);
    }

    public function delete($id)
    {
        return $this->orm->delete('film',$id);
    }

    public function listFilm()
    {
        return $this->orm->readAll('film');
    }

    public function insert($id)
    {
        return $this->orm->insert('film', $id);
    }

    public function verif($id)
    {
        return $this->orm->readSimple('film', $id);
    }

    public function poster($title)
    {
        $url = "http://www.omdbapi.com/?apikey=904c8570&t=" . urlencode($title);
        $content = file_get_contents($url);
        $img = json_decode($content, true);
        if ($img['Response'] == "True") {
            $moviepic = $img['Poster'];
            return $picurl = "<img src='" . $moviepic . " style='margin-right: 30%;margin-left: 30%;'>";
        } else {
            $picurl = null;
        }
    }

}