<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Http\Url;
use M\App;
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
     *
     * 默认为'?'查询字符串形式
     *
     * @var string
     */
    public static $mode = '?';

    /**
     * url自动生成工具
     *
     * 根据参数自动生成相应的url形式，在切换url模式时可避免手动修改的麻烦
     *
     * @example 如果只传入一个参数，那么可以是  "Controller/action/parameter" 形式
     *
     * @param $controller
     * @param $action
     * @param $parameter
     * @return string
     */
    public static function buildUrl($controller,$action='',$parameter='')
    {
        if(empty($action))
        {
            $path = self::$mode.$controller;
        }
        else if(empty($parameter))
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
     * 获取当前页面url
     *
     * @return string
     */
    public static function getUrl()
    {
        return Server::getHomeUrl().App::getRequest()->getRawRequests();
    }
}
