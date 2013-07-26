<?php
/**
 * User: Guowei
 * Date: 13-7-13
 * Time: 下午10:43
 */

namespace M\Mvc\View;


class View extends AbstractView
{

    private $var = array();

    public static function  init()
    {
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

        include_once $tpl;
    }
}