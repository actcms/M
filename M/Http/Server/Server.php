<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Http\Server;


class Server
{
    public static function getScriptName()
    {
        return $_SERVER['SCRIPT_NAME'];
    }

    public static function getHomeUrl()
    {
        return self::getScriptName();
    }

    public static function getBaseUrl()
    {
        return dirname(self::getScriptName());
    }

}