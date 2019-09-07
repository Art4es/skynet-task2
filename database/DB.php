<?php


namespace Skynet\database;


class DB
{
    private static $connection;

    private static function createPDO()
    {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
        self::$connection = new \PDO($dsn, DB_USER, DB_PASSWORD);
        self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }


    public static function getConnection(): \PDO
    {
        if (empty(self::$connection)) {
            self::createPDO();
        }
        return self::$connection;
    }
}