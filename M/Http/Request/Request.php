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
 * 获取并保存请求
 *
 * @package M\Http\Request
 */

class Request extends AbstractRequest
{
    /**
     * 原始请求
     * @var
     */
    private static $rawRequest;
    /**
     * @var string 保存处理后的请求
     */
    protected static $request;

    /**
     *初始化，获取并保存请求
     */
    public static function init()
    {

        if(!empty($_SERVER['QUERY_STRING']))
        {
            self::$rawRequest = $_SERVER['QUERY_STRING'];
        }
        else
        {
            self::$rawRequest = '';
        }
    }

    /**
     * @return string 返回处理后的字符串
     */
    public static function getRequest()
    {
        self::init();
        self::parseRequest();
        return self::$request;
    }

    /**
     * @return array 将原始请求字符串拆分为数组
     */
    public static function parseRequest()
    {
        self::$request = explode('/',self::$rawRequest);
    }
}