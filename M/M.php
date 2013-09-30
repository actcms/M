<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M;

use M\Base\Loader;
use M\Config\Config;
use M\Dispatcher\Dispatcher;
use M\Http\Request\PathRequest;
use M\Http\Request\Request;
use M\Log\Log;

/**
 * Class M
 * @package M
 */
class M
{
    /**
     * 配置信息实例
     * @var Config
     */
    private static $config;
    private static $request;
    /**
     * @var
     */
    private static $dispatcher;

    /**
     * 应用运行程序
     *
     * @param $configs
     */
    public static function run($configs)
    {
        define('M_START',microtime(true));
        self::init();

        self::$config = Config::init($configs);

        if(self::getConfig('urlRules')=='path')
        {
            self::$request = PathRequest::getRequest();
        }
        else
        {
            self::$request = Request::getRequest();
        }

        self::$dispatcher = new Dispatcher(self::$request);

        if(empty($_SESSION['app']))
        {
            $_SESSION['app'] = APP;
            Log::write(APP.' start');
        }
        define('M_END',microtime(true));
    }

    /**
     *应用初始化相关配置
     */
    private static function init()
    {
        session_start();

        defined('M') or define('M',str_replace('\\','/',dirname(__FILE__)));

        set_include_path(get_include_path().PATH_SEPARATOR.dirname(M).PATH_SEPARATOR.dirname(APP));

        require_once 'Base/Loader.php';
        Loader::register();
    }

    /**
     * 获取框架版本号
     * @return float
     */
    public static function getVersion()
    {
        return 0.1;
    }

    /**
     * 获取配置信息的公用方法
     *
     * 所有需要获取配置信息的部分都需要通过调用此方法获取
     * @param string $name
     * @return mixed
     */
    public static function getConfig($name = '')
    {
        return self::$config->getConfig($name);
    }

    /**
     * 获取 Request
     * @return mixed
     */
    public static function getRequest()
    {
        return self::$request;
    }

    /**
     * 第三方类库导入
     * @param $class
     */
    public static function import($class)
    {

    }

    /**
     * 获取运行时间
     * @return mixed
     */
    public static function getRuntime()
    {
        return M_END-M_START;
    }
}
