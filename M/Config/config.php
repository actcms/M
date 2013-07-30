<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Config;

/**
 * Class Config
 * @package M\Config
 */
class Config
{
    /**
     * @var
     */
    private static $config;

    /**
     * @param $config
     */
    public static function init($config)
    {
        self::$config = $config;
    }

    /**
     * @param string $name
     * @return mixed
     */
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

    /**
     *
     */
    public static function setConfig()
    {

    }
}
