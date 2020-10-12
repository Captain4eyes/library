<?php

// Hiding errors from users
//ini_set('display_errors', 0);

// App constants
define('ROOT', dirname(__FILE__));
define('DIR_SEP', DIRECTORY_SEPARATOR);
define('CONF_DIR', ROOT . DIR_SEP . 'config' . DIR_SEP);
define('TEMPLATE_DIR', ROOT . DIR_SEP . 'templates' . DIR_SEP);
define('STYLES_DIR', DIR_SEP . 'public' . DIR_SEP . 'styles' . DIR_SEP);
define('ICON_DIR', DIR_SEP . 'public' . DIR_SEP . 'images' . DIR_SEP . 'icons' . DIR_SEP);
define('JS_DIR', DIR_SEP . 'public' . DIR_SEP . 'js' . DIR_SEP);

// Autoload core files
require_once 'autoload.php';

// Starting Router
$router = new Router();
$router->run();