<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Mvc\Controller;

/**
 * Class AbstractController
 * @package M\Mvc\Controller
 */
abstract class AbstractController
{
    /**
     *构造器
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     *初始化，子类可以覆盖该方法以降初始化内容放入构造器
     */
    abstract function init();
    abstract function assign($key,$value);
    abstract function display($tpl);

    /**
     * 指定404错误页
     */
    abstract function error_404();


    /**
     * @param $name
     * @return null
     */
    public function __get($name)
    {
        $name = 'get'.ucfirst($name);

        if(method_exists($this,$name))
        {
            return $this->$name();
        }
        else
        {
            return null;
        }

    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name,$value)
    {

    }


}