<?php
/**
 * User: Guowei
 * Date: 13-7-13
 * Time: 下午10:43
 */

namespace M\Mvc\View;

use M\Config\Config;

class View extends AbstractView
{
    private static $viewPath;

    private $var = array();

    public static function init()
    {
        $config = Config::getConfig('app');
        self::$viewPath = $config['basePath'].'/View/';

        return new View();


    }

    public function assign($key,$value)
    {
        $this->var[$key] = $value;
    }

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