<?php
/**
 * User: Guowei
 * Date: 13-7-13
 * Time: 下午11:04
 */

namespace M\Config;


class Config
{
    private static $config;

    public static function init($config)
    {
        self::$config = $config;
    }

    public static function getConfig($name = '')
    {
        if(empty($name))
        {
            return self::$config;
        }
        else
        {
            return self::$config[$name];
        }

    }

    public static function setConfig()
    {

    }
}
