<?php

namespace src\Controller;
use Core\Flash;
use Core\Controller;

class AppController extends  Controller {

    public function indexAction()
    {
        $this->render('index');
    }

}

