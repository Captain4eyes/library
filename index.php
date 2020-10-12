<?php

// Hiding errors from users
//ini_set('display_errors', 0);

// App constants
define('ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
define('CONF_DIR', ROOT . DS . 'config' . DS);
define('TEMPLATE_DIR', ROOT . DS . 'templates' . DS);
define('STYLES_DIR', DS . 'public' . DS . 'styles' . DS);
define('ICON_DIR', DS . 'public' . DS . 'images' . DS . 'icons' . DS);
define('JS_DIR', DS . 'public' . DS . 'js' . DS);

// Autoload core files
require_once 'autoload.php';

// Starting Router
$router = new Router();
$router->run();