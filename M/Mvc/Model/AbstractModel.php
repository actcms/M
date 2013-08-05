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
     *
     */
    abstract public function init();

}