<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Extend;
use M\Mvc\Model\Model;

/**
 * Class Page
 * @package M\Extend
 */
class Page
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function countPage()
    {
        $this->model->select();
        $res = $this->model->query($this->model->getSql());
        return $colNumber = $res->columnCount();
    }
}