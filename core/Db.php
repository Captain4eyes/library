<?php

/**
 * Class Db
 */
class Db
{
    /**
     * Get database connection
     * @return PDO
     */
    public static function getConnection()
    {
        $paramFile = CONF_DIR . 'DbConfig.php';
        $params = include($paramFile);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        return new PDO($dsn, $params['user'], $params['password']/*, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] uncomment this param to debug*/);
    }
}