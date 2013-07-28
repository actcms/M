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
use M\Loader\Loader;

/**
 * Class M
 * @package M
 */
class M
{
    /**
     * @var
     */
    private static $config;

    /**
     * @param $config
     */
    public static function run($config)
    {
        self::init();

        //get configs
        Config::init($config);
        self::$config = Config::getConfig('db');

        $dispatcher = new Dispatcher();
    }

    /**
     *
     */
    private static function init()
    {
        //todo the path must can be config at app config files
        set_include_path(get_include_path().PATH_SEPARATOR.'E:/www/M'.PATH_SEPARATOR.'E:/www/M/Demos');

        require_once 'Loader/Loader.php';
        Loader::register();
    }

    /**
     * @param string $name
     * @return mixed
     */
    public static function getConfig($name = '')
    {
        return Config::getConfig($name);
    }

    /**
     *
     */
    public static function import()
    {

    }
}

