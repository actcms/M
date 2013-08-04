<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Http\Request;


class PathRequest extends Request
{
    public static function init()
    {
        if(!empty($_SERVER['PATH_INFO']))
        {
            self::$request = ltrim($_SERVER['PATH_INFO'],'/');
        }
        else
        {
            self::$request = '';
        }
    }
}