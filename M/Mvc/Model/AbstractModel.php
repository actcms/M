<?php
/**
 * @link https://github.com/MaGuowei/M
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
     *构造器
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     *初始化，用于子类覆盖，自动加入构造器
     */
    public function init()
    {

    }
}