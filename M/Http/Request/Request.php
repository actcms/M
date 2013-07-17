<?php
/**
 * User: Guowei
 * Date: 13-7-13
 * Time: 下午10:44
 */

namespace M\Http\Request;


class Request extends AbstractRequest
{
    protected static $request;

    public static function init()
    {
        $request = $_SERVER['QUERY_STRING'];
        if(!empty($request))
        {
            self::$request = $request;
        }
        else
        {
            self::$request = '';
        }
    }

    public static function getRequest()
    {
        return self::$request;
    }

    public static function parseRequest()
    {
        return explode('/',self::$request);
    }
}