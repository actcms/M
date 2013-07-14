<?php
/**
 * User: Guowei
 * Date: 13-7-13
 * Time: 下午11:23
 */

namespace M;
//define('MPATH',str_replace('\\','/',dirname(__FILE__).'/'));

use M\Config\Config;
use M\Dispatcher\Dispatcher;

class M
{
    private static $config;

    private static function init()
    {
        //set_include_path(get_include_path().PATH_SEPARATOR.'E:/www/M'.PATH_SEPARATOR.'E:/www/M/Demos');
        set_include_path(get_include_path().PATH_SEPARATOR.'E:/www/M'.PATH_SEPARATOR.'E:/www/M/Demos');
        spl_autoload_register(array('M\M','autoload'));
    }

    public static function run($config)
    {
        self::init();

        //get configs
        Config::init($config);
        self::$config = Config::getConfig('db');
        print_r(self::$config);


        $dispatcher = new Dispatcher();
    }

    public static function autoload($class)
    {

        $file = str_replace('\\','/',$class).'.php';
        require_once $file;
    }

    public static function getConfig($name = '')
    {
        return Config::getConfig($name);
    }
}
