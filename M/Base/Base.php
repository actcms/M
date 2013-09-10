<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Base;

/**
 * 基础类
 * Class Base
 * @package M\Base
 */
class Base
{
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
            $this->$method($value);
        }
        else
        {
            $this->$name = $value;
            return $this;
        }
    }
}