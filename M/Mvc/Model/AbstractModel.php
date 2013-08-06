<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Mvc\Model;

/**
 * Class AbstractModel
 * @package M\Mvc\Model
 */
abstract class AbstractModel
{
    /**
     * @var
     */
    protected $table;
    /**
     * 构造方法
     */
    public function __construct($table)
    {
        $this->table = $table;
        $this->init();
    }

    /**
     *子类覆盖用于配置初始化
     */
    abstract public function init();

    /**
     * @param $name
     * @return null
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
            return null;
        }

    }

    /**
     * @param $name
     * @param $value
     * @return null
     */
    public function __set($name,$value)
    {
        $method = 'set'.ucfirst($name);
        if(method_exists($this,$method))
        {
            $this->$method($value);
        }
        else
        {
            return null;
        }

    }

}