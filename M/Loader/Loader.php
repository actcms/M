<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Loader;

/**
 * 自动加载类
 *
 * Class Loader
 * @package M\Loader
 */

class Loader
{
    /**
     * 建立自动加载函数，加载规则
     *
     * @param $class
     * @return bool
     */
    public static function autoload($class)
    {

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
        spl_autoload_register('M\Loader\Loader::autoload');
    }

}