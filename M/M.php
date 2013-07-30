<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
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
     *应用初始化相关配置
     */
    private static function init()
    {
        //todo the path must can be config at app config files
        set_include_path(get_include_path().PATH_SEPARATOR.'E:/www/M'.PATH_SEPARATOR.'E:/www/M/Demos');

        require_once 'Loader/Loader.php';
        Loader::register();
    }

    /**
     * 获取配置信息
     * @param string $name
     * @return mixed
     */
    public static function getConfig($name = '')
    {
        return Config::getConfig($name);
    }

    /**
     *导入扩展
     */
    public static function import()
    {

    }
}

