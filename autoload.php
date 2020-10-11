<?php

// Autoload files
spl_autoload_register(function ($class) {
    switch ($class) {
        case 'Book':
        case 'Author':
        case 'BaseModel':
            require_once(ROOT . DS . 'models' . DS . $class . '.php');
            break;
        default:
            require_once(ROOT . DS .'core' . DS . $class . '.php');
    }
});
