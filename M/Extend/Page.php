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
    /**
     * 传入的模型
     * @var \M\Mvc\Model\Model
     */
    private $model;
    /**
     * 总条数
     * @var
     */
    private $countRows;
    /**
     * 每页显示的条数
     * @var int
     */
    private $rows;
    /**
     * 页数
     * @var
     */
    private $page;

    /**
     * 初始化
     *
     * 传入模型并设定每页显示的记录数
     *
     * @param Model $model
     * @param $rows
     */
    public function __construct(Model $model,$rows = 5)
    {
        $this->model = $model;
        $this->rows = $rows;
        $this->countRows();
        $this->countPage();
    }

    /**
     * 计算查询得到的中记录条数
     */
    public function countRows()
    {
        $rows = $this->model->select("count(*)");
        $this->model->cols('*');
        $this->countRows = $rows[0][0];
    }

    /**
     *计算页数
     */
    public function countPage()
    {
        if($this->countRows % $this->rows == 0)
        {
            $this->page = $this->countRows / $this->rows;
        }
        else
        {
            $this->page = floor($this->countRows / $this->rows)+1;
        }
    }

    /**
     * @return mixed
     */
    public function getCountCols()
    {
        return $this->countRows;
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }
}