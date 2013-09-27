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
     * PDO连接实例
     *
     * @var \PDO
     */
    private $PDO;
    /**
     * 模型
     * @var Model
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
     * @param \PDO $PDO
     */
    public function __construct(Model $model,\PDO $PDO)
    {
        $this->model = $model;
        $this->PDO = $PDO;
    }

    /**
     * 生成插入语句
     *
     * @return string
     */
    public function insertSqlBuild()
    {
        $this->parseDate();
        $sql = "INSERT INTO `%s` (`%s`) VALUES (%s)";
        $fields = implode('`,`', $this->fields);
        $values = implode(',', $this->values);

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
        $model = $this->model;
        $sql = "DELETE FROM %s WHERE $model->primary_key = $id";
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
        $sql = "UPDATE `%s` SET %s WHERE $model->primary_key = %s";

        $data = array();
        foreach($this->data as $key => $value)
        {
            $data[] = $key.' = '.$value;
        }
        $data = join(',',$data);
        return sprintf($sql,$this->model->table,$data,$this->data[$model->primary_key]);
    }

    /**
     * 生成查询语句
     *
     * @return string
     */
    public function selectSqlBuild()
    {
        $sql = "SELECT %s FROM %s %s %s %s %s";
        $model = $this->model;
        return sprintf($sql,$model->cols,$model->table,$model->join,$model->where,$model->order,$model->limit);
    }

    /**
     * 依据id查询单条信息
     *
     * @param $id
     * @return string
     */
    public function findByIdSqlBuild($id)
    {
        if(($this->model->join) != '')
        {
            $table = $this->model->table;
            $key = $this->model->primary_key;
            $key = $table.'.'.$key;
        }
        else
        {
            $key = $this->model->primary_key;
        }
        return $this->findSqlBuild($key,$id);
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
        $sql = "SELECT %s FROM %s %s WHERE $key = '$value'";
        return sprintf($sql,$this->model->cols,$this->model->table,$this->model->join);
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
                $values[] = $this->PDO->quote($this->model->$value);
            }
        }

        $this->fields = $fields;
        $this->values = $values;
        $this->data = array_combine($fields, $values);
    }
}