<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Http\Url;

use M\Http\Url\Url;

class UrlHelper
{
    /**
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
            $url = Url::urlBuild($controller,$action,$parameter);
        }

        echo "<script>location.href='$url';</script>";
    }

    /**
     * @param $message
     *
     * @param array $url    array($controller,$action,$parameter=null)
     */
    public static function success($message,Array $url=null)
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

    private static function message($message)
    {
        echo "<script>alert('$message');</script>";
    }
}