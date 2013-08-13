<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Http\Url;
use M\Http\Server\Server;

/**
 * URL处理类
 * Class Url
 * @package M\Http\Url
 */
class Url
{
    /**
     * url模式分隔符
     * 默认为'?'形式
     * @var string
     */
    public static $mode = '?';
    /**
     * @param $controller
     * @param $action
     * @param $parameter
     * @return string
     */
    public static function urlBuild($controller,$action,$parameter='')
    {
        if(empty($parameter))
        {
            $path = self::$mode."$controller/$action";
        }
        else
        {
            $path = self::$mode."$controller/$action/$parameter";
        }

        return Server::getHomeUrl().$path;

    }

    /**
     *
     */
    public static function jump()
    {

    }


}