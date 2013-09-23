<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Config;

/**
 * Class Config
 * @package M\Config
 */
class Config
{
    /**
     * 保存配置数组信息
     * @var array
     */
    private $configs = array();
    /**
     * 保存单例
     * @var
     */
    private static $config;

    /**
     * @param $config
     * @return Config
     */
    public static function init($config)
    {
        //self::$config = $config;
        if(empty(self::$config))
        {
            self::$config = new Config($config);
        }

        return self::$config;
    }

    /**
     * @param $config
     */
    private function __construct($config)
    {
        $this->configs = $config;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getConfig($name = '')
    {
        if(empty($name))
        {
            return $this->configs;
        }
        else
        {
            return $this->configs[$name];
        }
    }

    /**
     *
     */
    public function setConfig()
    {

    }
}
