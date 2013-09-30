<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Mvc\Model;
use M\Base\Base;

/**
 * Class AbstractModel
 * @package M\Mvc\Model
 */
abstract class AbstractModel
{
    /**
     * 数据库表名
     * @var
     */
    protected $table;
    /**
     * 构造方法
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     *子类覆盖用于配置初始化
     */
    abstract public function init();

    /**
     * 属性魔术访问方法
     *
     * 如果存在单独的访问方法则返回访问方法的返回值，否则，直接返回受访问限制的属性
     *
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        $method = 'get'.ucfirst($name);
        if(method_exists($this,$method))
        {
            return $this->$method();
        }
        else
        {
            return $this->$name;
        }
    }

    /**
     * 属性魔术设置方法
     *
     * @param $name
     * @param $value
     * @return null
     */
    public function __set($name,$value)
    {
        $method = 'set'.ucfirst($name);
        if(method_exists($this,$method))
        {
            return $this->$method($value);
        }
        else
        {
            return $this->$name = $value;
        }
    }
}