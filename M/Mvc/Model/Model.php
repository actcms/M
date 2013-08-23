<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Mvc\Model;

use M\M;
use M\Db\Db;
use M\Form\Form;

/**
 * Class Model
 * @package M\Mvc\Model
 */
class Model extends AbstractModel
{
    /**
     * @var
     */
    private static $db;

    protected $table;
    protected $key;
    protected $data;
    /**
     * @var
     */
    protected $where;
    /**
     * @var
     */
    protected $orderBy;
    /**
     * @var
     */
    protected $limit;

    /**
     *初始化
     */
    public function init()
    {
        if(empty(self::$db))
        {
            $db = M::getConfig('db');
            self::$db = new Db($db['dsn'],$db['user'],$db['password']);

        }
        else
        {
            return self::$db;
        }
    }

    /**
     * @param $where
     * @return $this
     */
    public function where($where)
    {
        $this->where = " WHERE $where";
        return $this;
    }

    /**
     * @param $by
     * @param string $order
     * @return $this
     */
    public function orderBy($by,$order='desc')
    {
        $this->orderBy = " ORDER BY `$by` $order";
        return $this;
    }

    /**
     * @param $number
     * @param null $number2
     * @return $this
     */
    public function limit($number,$number2=null)
    {
        if(isset($number2))
        {
            $this->limit = " LIMIT $number,$number2";
        }
        else
        {
            $this->limit = " LIMIT $number";
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function select()
    {
        $sql = "SELECT * FROM $this->table";
        $sql .= $this->where;
        $sql .= $this->orderBy;
        $sql .= $this->limit;

        $result = self::$db->select($sql);
        return $result;
    }

    /**
     * @param $key
     * @param string $value
     * @return mixed
     */
    public function find($key,$value='')
    {
        if(empty($value))
        {
            return $this->findById($key);
        }
        else
        {
            $sql = "SELECT * FROM $this->table WHERE $key = '$value'";
            $result = self::$db->find($sql);
            return $result;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        $sql = "SELECT * FROM $this->table WHERE $this->key = '$id'";
        $result = self::$db->find($sql);
        return $result;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE $this->key = $id";
        $result = self::$db->delete($sql);
        return $result;
    }

    /**
     * @return mixed
     */
    public function add()
    {
        $sql ="INSERT INTO `$this->table` (";
        foreach ($this->data as $key=>$value)
        {
            if(!empty($this->$value))
            {
                $sql .= "`$key`,";
            }
        }

        $sql = rtrim($sql,',');		//去掉产生的sql语句末尾逗号

        $sql .= ") VALUES (";
        foreach ($this->data as $key=>$value)
        {
            if(!empty($this->$value))
            {
                $sql .= "'".$this->$value."'".',';
            }
        }

        $sql = rtrim($sql,',');		//去除末尾逗号

        $sql .= ")";
        $result = self::$db->insert($sql);
        return $result;
    }

    /**
     * 保存记录
     *
     * 根据是$key值是否为空选择插入或者更新
     */
    public function save()
    {
        if(empty($this->id))
        {
            return $this->add();
        }
        else
        {
            return $this->update();
        }
    }

    /**
     * @return mixed
     */
    public function update()
    {
        $sql = "UPDATE `$this->table` SET ";
        foreach($this->data as $key=>$value)
        {
            if(!empty($this->$value))
            {
                $sql .= "`$key` = '{$this->$value}',";
            }
        }

        $sql = rtrim($sql,',');

        $sql .= " WHERE $this->key = $this->id";

        $result = self::$db->update($sql);
        return $result;
    }

    /**
     * 执行原始sql语句
     * @param $sql
     * @return mixed
     */
    public function query($sql)
    {
        $result = self::$db->exec($sql);
        return $result;
    }

    /**
     * 获取POST提交的数据
     *
     * 自动将POST方式提交的数据赋值到模型属性
     */
    public function get_Post()
    {
        Form::postToModel($this);
    }

    public function getPdo()
    {
        return self::$db->getPdo();
    }

}