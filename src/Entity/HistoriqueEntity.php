<?php
/**
 * Created by PhpStorm.
 * User: omg-p
 * Date: 04/10/2018
 * Time: 20:40
 */

namespace Src\Entity;

use Core\Entity;
use Src\Model\HistoriqueModel;

class HistoriqueEntity extends Entity
{
    protected static $relations;

    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $historique = new HistoriqueModel();
        self::$relations = $historique->getRelations();
    }

    public function read($id)
    {
        return $this->orm->read('historique_membre', $id, self::$relations);
    }

    public function add($id)
    {
        $this->orm->create('historique_membre', array('id_membre' => $_SESSION['id_user'], 'id_film' => $id));
    }

    public function delete($id)
    {
        $this->orm->delete('historique_membre', $id);
    }

    public function create($id)
    {
        $this->orm->create('historique_membre', array('id_membre' => $_SESSION['users']['id_user'], 'id_film' => $id, 'date' => date('Y-m-d h:m:s')));
    }
}