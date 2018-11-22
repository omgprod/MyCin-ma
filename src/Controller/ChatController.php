<?php
/**
 * Created by PhpStorm.
 * User: omg-p
 * Date: 07/10/2018
 * Time: 23:23
 */

namespace src\Controller;

use Core\Controller;
use Core\Database;
use Src\Entity\UserEntity;
use Src\Model\UserModel;


class ChatController
{
    public function indexAction()
    {
        $model = new UserEntity();
        $model->read($_SESSION['users']['id_user']);
        header('Location:' . BASE_URI . '/chat');
    }

}