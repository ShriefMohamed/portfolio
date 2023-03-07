<?php


namespace Framework\models;


use Framework\Lib\AbstractModel;

class UsersModel extends AbstractModel
{
    public $id;
    public $firstName;
    public $lastName;
    public $username;
    public $email;
    public $password;
    public $phone;
    public $role;
    public $notifications;
    public $created;
    public $lastUpdate;
    public $lastSeen;
    public $forgotPasswordToken;
    public $forgotPasswordToken_time;
    public $authCode;
    public $authCode_time;
    public $loginAttempts;
    public $loginAttempts_time;

    protected static $tableName = 'users';
    protected static $pk = 'id';
    protected $tableSchema = array(
        'firstName' => self::DATA_TYPE_STR,
        'lastName' => self::DATA_TYPE_STR,
        'username' => self::DATA_TYPE_STR,
        'email' => self::DATA_TYPE_STR,
        'password' => self::DATA_TYPE_STR,
        'phone' => self::DATA_TYPE_INT,
        'role' => self::DATA_TYPE_STR,
        'notifications' => self::DATA_TYPE_INT,
        'created' => self::DATA_TYPE_STR,
        'lastUpdate' => self::DATA_TYPE_STR,
        'lastSeen' => self::DATA_TYPE_STR,
        'forgotPasswordToken' => self::DATA_TYPE_STR,
        'forgotPasswordToken_time' => self::DATA_TYPE_STR,
        'authCode' => self::DATA_TYPE_INT,
        'authCode_time' => self::DATA_TYPE_STR,
        'loginAttempts' => self::DATA_TYPE_INT,
        'loginAttempts_time' => self::DATA_TYPE_STR
    );

    public static function Authenticate($username, $password)
    {
        $sql = "SELECT users.* 
                FROM " . static::$tableName . " 
                WHERE (users.username = :username OR users.email = :email) AND users.password = :password ";
        return parent::getSQL($sql, array(
            'username' => array(parent::DATA_TYPE_STR, $username),
            'email' => array(parent::DATA_TYPE_STR, $username),
            'password' => array(parent::DATA_TYPE_STR, $password)
        ), true);
    }

    public static function Search($query)
    {
        $sql = "SELECT * FROM users 
                WHERE 
                    id LIKE '%$query%' ||
                    firstName LIKE '%$query%' ||
                    lastName LIKE '%$query%' ||
                    username LIKE '%$query%' ||
                    email LIKE '%$query%' ||
                    phone LIKE '%$query%' ";
        return parent::getSQL($sql);
    }
}