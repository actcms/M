<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Http\Request;

/**
 * Class Request
 *
 * 获取并保存用户请求
 *
 * @package M\Http\Request
 */

class Request extends AbstractRequest
{
    /**
     * @var string 保存用户请求
     */
    protected static $request;

    /**
     *初始化，获取并保存用户请求
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
     * @return string 返回用户请求的原始字符串
     */
    public static function getRequest()
    {
        return self::$request;
    }

    /**
     * @return array 将原始请求字符串拆分为数组
     */
    public static function parseRequest()
    {
        return explode('/',self::$request);
    }
}