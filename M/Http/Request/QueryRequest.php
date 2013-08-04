<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Http\Request;


/**
 * 处理Query方式的请求
 * Class QueryRequest
 * @package M\Http\Request
 */
class QueryRequest extends Request
{

    public static function init()
    {

        if(!empty($_SERVER['QUERY_STRING']))
        {
            self::$request = $_SERVER['QUERY_STRING'];
        }
        else
        {
            self::$request = '';
        }
    }

}