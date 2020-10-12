<?php

// Autoload files
spl_autoload_register(function ($class) {
    switch ($class) {
        case 'Book':
        case 'Author':
        case 'BaseModel':
            require_once(ROOT . DIR_SEP . 'models' . DIR_SEP . $class . '.php');
            break;
        default:
            require_once(ROOT . DIR_SEP .'core' . DIR_SEP . $class . '.php');
    }
});
