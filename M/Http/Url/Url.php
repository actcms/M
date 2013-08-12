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
     * @param $controller
     * @param $action
     * @param $parameter
     * @return string
     */
    public static function urlBuild($controller,$action,$parameter='')
    {
        if(empty($parameter))
        {
            return "?$controller/$action";
        }
        else
        {
            return "?$controller/$action/$parameter";
        }

    }

    /**
     *
     */
    public static function jump()
    {

    }


}