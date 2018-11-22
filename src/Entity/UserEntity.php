<?php
/**
 * Created by PhpStorm.
 * User: omg-p
 * Date: 02/10/2018
 * Time: 20:21
 */

namespace Src\Entity;

use Core\Flash;
use Core\Entity;
use src\Model\UserModel;

class UserEntity extends Entity
{

    protected static $relations;

    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $user = new UserModel();
        self::$relations = $user->getRelations();
    }

    public function create($param)
    {
        $this->orm->create('user',$param);
    }

    public function read($id)
    {
        return $this->orm->read('user',$id,self::$relations);
    }

    public function read_second($id)
    {
        return $this->orm->readSecondPart('user',$id,self::$relations);
    }

    public function update($id, $param)
    {
        return $this->orm->update('user',$id,$param);
    }

    public function delete($id)
    {
        return $this->orm->delete('user',$id);
    }

    public function read_all($param)
    {
        return $this->orm->find('user', ["email = " => "$param"]);
    }

    public function login($param)
    {
        $req = $this->orm->find('user',array('email = ' => $param['email']),true);
        if (empty($req))
        {
            Flash::set(array("danger", "Adresse email invalide"));
        } else {
            if ($req['password'] == $param['password'])
            {
                $_SESSION['users'] = $req;
            } else {
                Flash::set(array("danger", "Mot de passe invalide"));
            }
        }
    }
}