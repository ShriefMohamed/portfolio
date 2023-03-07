<?php


namespace Framework\lib;


trait FilterInput
{
    private static function Check($value)
    {
        return empty($value) ? false : $value;
    }

    public static function Int($value)
    {
        return is_int(self::Check(intval($value))) ? filter_var($value, FILTER_SANITIZE_NUMBER_INT) : false;
    }

    public static function String($value)
    {
        return is_string(self::Check($value)) ? filter_var($value, FILTER_SANITIZE_STRING) : false;
    }

    public static function Email($value)
    {
        return self::Check($value) ? filter_var($value, FILTER_SANITIZE_EMAIL) : false;
    }
}