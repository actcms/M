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
     *
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     *
     */
    public function init()
    {

    }
}