<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Http\Url;

use M\Http\Url\Url;

/**
 * Url助手
 *
 * Class UrlHelper
 * @package M\Http\Url
 */
class UrlHelper
{
    /**
     * url跳转
     *
     * 根据设定参数自动生成符合当前url模式的url跳转方法
     *
     * @param string $controller
     * @param string $action
     * @param string $parameter
     * @return string
     */
    public static function jump($controller='',$action='',$parameter='')
    {
        if(empty($controller))
        {
            echo "<script>history.back();</script>";
        }
        else
        {
            $url = Url::buildUrl($controller,$action,$parameter);
        }

        echo "<script>location.href='$url';</script>";
    }

    /**
     * 操作成功返回内容
     *
     * @param $message
     *
     * @param array $url    array($controller,$action,$parameter=null)
     */
    public static function success($message,Array $url = null)
    {
        self::message($message);

        if(empty($url[2]))
        {
            self::jump($url[0],$url[1]);
        }
        else
        {
            self::jump($url[0],$url[1],$url[2]);
        }
    }

    /**
     * 操作失败时返回的内容
     *
     * @param string $message
     * @param array $url
     */
    public static function error($message,Array $url=null)
    {
        self::message($message);

        if(empty($url[2]))
        {
            self::jump($url[0],$url[1]);
        }
        else
        {
            self::jump($url[0],$url[1],$url[2]);
        }
    }

    /**
     * 弹出消息
     *
     * @param $message
     */
    private static function message($message)
    {
        echo "<script>alert('$message');</script>";
    }
}