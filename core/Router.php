<?php


/**
 * Class Router
 */
class Router
{
    /** @var array list of actual routes */
    private $routes;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $routesConfig = CONF_DIR . 'routes.php';
        $this->routes = include($routesConfig);
    }

    /**
     * Return URI string, if not empty.
     * Else return default controller/action.
     */
    private function getURI()
    {
        return trim($_SERVER['REQUEST_URI'], '/') ?? '';
    }

    /**
     * Execute routing process
     */
    public function run()
    {
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {
            // Check URI pattern from routes.php
            if (preg_match("~$uriPattern~", $uri)) {
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // Init controller, action and params
                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;

                $controllerFile = ROOT . DIR_SEP .'controllers' . DIR_SEP . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($result != null) {
                    break;
                }
            }
        }
    }
}