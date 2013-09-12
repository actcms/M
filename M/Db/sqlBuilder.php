<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Db;
use M\Mvc\Model\Model;

/**
 * sql语句生成器
 *
 * Class sqlBuilder
 * @package M\Db
 */
class SqlBuilder
{
    /**
     * 模型
     * @var \M\Mvc\Model\Model
     */
    private $model;
    /**
     * @var array 字段
     */
    private $fields;
    /**
     * @var array 字段值
     */
    private $values;
    /**
     * @var array 字段信息
     */
    private $data = array();

    /**
     * 初始化
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * 生成插入语句
     *
     * @return string
     */
    public function insertSqlBuild()
    {
        $this->parseDate();
        $sql = "INSERT INTO `%s` (`%s`) VALUES ('%s')";
        $fields = implode('`,`', $this->fields);
        $values = implode('\',\'', $this->values);

        return sprintf($sql, $this->model->table, $fields, $values);
    }

    /**
     * 生成删除语句
     *
     * @param $id
     * @return string
     */
    public function deleteSqlBuild($id)
    {
        $sql = "DELETE FROM %s WHERE $this->model->primary_key = $id";
        return sprintf($sql,$this->model->table);
    }

    /**
     * 生成更新语句
     *
     * @return string
     */
    public function updateSqlBuild()
    {
        $this->parseDate();
        $model = $this->model;
        $sql = "UPDATE `%s` SET %s WHERE $model->primary_key = $model->id";

        $data = array();
        foreach($this->data as $key => $value)
        {
            $data[] = $key.' = '.'\''.$value.'\'';
        }
        $data = join(',',$data);
        return sprintf($sql,$this->model->table,$data);
    }

    /**
     * 生成查询语句
     *
     * @return string
     */
    public function selectSqlBuild()
    {
        $sql = "SELECT %s FROM %s %s %s %s";
        $model = $this->model;
        return sprintf($sql,$model->cols,$model->table,$model->where,$model->order,$model->limit);
    }

    /**
     * 依据id查询单条信息
     *
     * @param $id
     * @return string
     */
    public function findByIdSqlBuild($id)
    {
        return $this->findSqlBuild($this->model->primary_key,$id);
    }

    /**
     * 查处单条信息
     *
     * @param $key
     * @param $value
     * @return string
     */
    public function findSqlBuild($key,$value)
    {
        $sql = "SELECT %s FROM %s WHERE $key = '$value'";
        return sprintf($sql,$this->model->cols,$this->model->table);
    }

    /**
     *解析模型数据
     */
    private function parseDate()
    {
        $fields = array();
        $values = array();

        $data = $this->model->data;
        foreach($data as $field => $value)
        {
            if($this->model->$value != '')
            {
                $fields[] = $field;
                $values[] = $this->model->$value;
            }
        }

        $this->fields = $fields;
        $this->values = $values;
        $this->data = array_combine($fields, $values);
    }
}