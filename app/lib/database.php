<?php


namespace Framework\Lib;


class Database
{
    private static $connection;

    private function __construct() {}

    public static function CreateConnection()
    {
        if (self::$connection === null) {
            try {
                self::$connection = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
            } catch (\Exception $e) {
                echo 'Database connection can not be established. Please try again later.' . '<br>';
                echo 'Error code: ' . $e->getCode();
                exit();
            }
        }
        return self::$connection;
    }
}