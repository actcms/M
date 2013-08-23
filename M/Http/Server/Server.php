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
     * 获取主机名
     *
     * @return mixed
     */
    public static function getServerName()
    {
        return $_SERVER['SERVER_NAME'];
    }

    /**
     * 获取执行脚本名
     *
     * @return mixed
     */
    public static function getScriptName()
    {
        return $_SERVER['SCRIPT_NAME'];
    }

    /**
     * 获取首页url
     *
     * 例：www.example.com/index.php
     *
     * @return mixed
     */
    public static function getHomeUrl()
    {
        return self::getScriptName();
    }
}