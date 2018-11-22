<?php

namespace Core;


class Controller
{

    public static $_render;
    private $TemplateEngine;

    public function __construct()
    {
        $this->TemplateEngine = new TemplateEngine();
        new Request();
    }

    protected function render($view, $scope = [])
    {
        extract($scope);
        if (Flash::get() == !null) {
            $flash = Flash::get();
        } $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View',
                str_replace('Controller', '',
                basename(get_class($this))), $view]) . '.php';
        if (file_exists($f)) {
            $f = $this->TemplateEngine->parseView($f);
            ob_start();
            require(implode(DIRECTORY_SEPARATOR,
                    [dirname(__DIR__), 'src', 'View', 'temp']) . '.php');
            $view = ob_get_clean();
            ob_start();
            include(implode(DIRECTORY_SEPARATOR,
                    [dirname(__DIR__), 'src', 'View', 'index']) . '.php');
            self::$_render = ob_get_clean();
        }
    }

    public function __destruct()
    {
        echo(self::$_render);
        //Flash::set();
    }

}
