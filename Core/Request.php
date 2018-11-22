<?php

namespace Core;

class Request
 {

    public function __construct()
    {
        foreach ($_POST as $key => $value)
        {
            $_POST[$key] = trim(stripslashes(htmlspecialchars($value)));
        }

        foreach ($_GET as $key => $value)
        {
            $_GET[$key] = trim(stripslashes(htmlspecialchars($value)));
        }
    }

}