<?php

namespace Core;

class Core
{
    public function run()
    {
        //echo __CLASS__ . " [OK]" . PHP_EOL;
        require './routes.php';
        $url = substr($_SERVER['REQUEST_URI'], strlen(BASE_URI));
        $r = Router::get($url);
        $ctrl = "src\Controller\\" . ucfirst($r['controller']) . "Controller";
        $action = ucfirst($r['action']) . "Action";

        if (!is_null($r)) {
            $c = new $ctrl();
            $c->$action();
        } else {
            header('location: ' . BASE_URI . '/404');
        }
    }
}