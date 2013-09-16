<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M;

/**
 * Class App
 * @package M
 */
class App extends M
{
    /**
     * 方法委托
     * 直接委托无参数方法，有参数的方法单独处理
     * @param $name
     * @param $arguments
     * @return null 方法不存在时返回空
     */
    public static function __callStatic($name,$arguments)
    {
        if(method_exists('\M\Http\Server\Server',$name))
        {
            return Http\Server\Server::$name();
        }
        else if(method_exists('\M\Http\Url\Url',$name))
        {
            return Http\Url\Url::$name();
        }
        else
        {
            return null;
        }
    }

    /**
     * 自动生成url
     *
     * 依据配置文件的设置自动生成url,避免
     * @param $controller
     * @param $action
     * @param string $parameter
     * @return string
     */
    public static function buildUrl($controller,$action='',$parameter = '')
    {
        if(self::getConfig('urlRules')=='path')
        {
            $mode = '/';
        }
        else
        {
            $mode = '?';
        }
        Http\Url\Url::$mode = $mode;

        return Http\Url\Url::buildUrl($controller,$action,$parameter);
    }

    public static function Text()
    {
        return Text;
    }
}
