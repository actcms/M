<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Mvc\View;

use M\Config\Config;

/**
 * Class View
 * @package M\Mvc\View
 */
class View extends AbstractView
{
    /**
     * @var
     */
    private static $viewPath;
    /**
     * @var array
     */
    private $var = array();

    /**
     * @return View
     */
    public static function init()
    {
        $config = Config::getConfig('app');
        self::$viewPath = $config['basePath'].'/View/';

        return new View();


    }

    /**
     * @param $key
     * @param $value
     */
    public function assign($key,$value)
    {
        $this->var[$key] = $value;
    }

    /**
     * @param $tpl
     */
    public function display($tpl)
    {
        $name = array_keys($this->var);
        foreach($name as $key)
        {
            $$key=$this->var[$key];
        }

        $tpl = self::$viewPath.$tpl;
        include_once $tpl;
    }

}