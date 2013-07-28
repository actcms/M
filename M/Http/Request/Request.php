<?php
/**
 * User: Guowei
 * Date: 13-7-13
 * Time: 下午10:44
 */

namespace M\Http\Request;

/**
 * Class Request
 * @package M\Http\Request
 */
class Request extends AbstractRequest
{
    /**
     * @var
     */
    protected static $request;

    /**
     *
     */
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

    /**
     * @return mixed
     */
    public static function getRequest()
    {
        return self::$request;
    }

    /**
     * @return array
     */
    public static function parseRequest()
    {
        return explode('/',self::$request);
    }
}