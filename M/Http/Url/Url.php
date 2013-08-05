<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Http\Url;

/**
 * URL处理类
 * Class Url
 * @package M\Http\Url
 */
class Url
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
     *
     */
    public static function jump()
    {

    }


}