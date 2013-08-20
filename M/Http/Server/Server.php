<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Http\Server;
use M\M;

/**
 * Class Server
 * @package M\Http\Server
 */
class Server
{
    /**
     * @return mixed
     */
    public static function getServerName()
    {
        return $_SERVER['SERVER_NAME'];
    }

    /**
     * @return mixed
     */
    public static function getScriptName()
    {
        return $_SERVER['SCRIPT_NAME'];
    }

    /**
     * @return mixed
     */
    public static function getHomeUrl()
    {
        return self::getScriptName();
    }
}