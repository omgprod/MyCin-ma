<?php

namespace src\Controller;
use Core\Flash;
use Core\Controller;

class ErrorController extends Controller {

    public function NotFoundAction() {
        header("HTTP/1.0 404 Not Found");
        $this->render('404');
    }

}