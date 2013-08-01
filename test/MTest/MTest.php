<?php
/**
 * User: Guowei
 * Date: 13-7-14
 * Time: 上午9:23
 */

class MTest
{

    public static function init()
    {
        self::register();
    }

    /**
     * 建立自动加载函数，加载规则
     * @param $class
     * @return bool
     */
    public static function autoload($class)
    {
        set_include_path(get_include_path().PATH_SEPARATOR.'E:/www/M'.PATH_SEPARATOR.'E:/www/M/Demos');

        $file = str_replace('\\','/',$class).'.php';
        $file = stream_resolve_include_path($file);

        if(file_exists($file))
        {
            require_once $file;
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     *注册自动加载函数
     */
    public static function register()
    {
        spl_autoload_register('self::autoload');
    }
}

MTest::init();