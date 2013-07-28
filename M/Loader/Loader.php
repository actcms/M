<?php
/**
 * User: Guowei
 * Date: 13-7-13
 * Time: 下午11:12
 */

namespace M\Loader;


class Loader
{
    /**
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
     *
     */
    public static function register()
    {
        spl_autoload_register('M\Loader\Loader::autoload');
    }

}