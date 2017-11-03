<?php


require_once('controller/UserController.php');
require_once './vendor/autoload.php';

abstract class TwigView {

    private static $twig;

    public static function getTwig() {

        if (!isset(self::$twig)) {

            Twig_Autoloader::register();
            $loader = new Twig_Loader_Filesystem('./templates');
            self::$twig = new Twig_Environment($loader);
            self::$twig->addGlobal('usuario',(UserController::getInstance()->usuarioLogueado()));
        }
        return self::$twig;
    }

}
