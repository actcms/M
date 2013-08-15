<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Mvc\Model;

use M\Db\Db;
use M\M;

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
     *查出单条记录
     */
    public function find($id)
    {
        $sql = "SELECT * FROM $this->table WHERE $this->key = $id";
        $result = self::$db->find($sql);
        return $result;
    }

    /**
     *删除一条记录
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
     *保存记录
     */
    public function save()
    {

    }

    /**
     *更新一条记录
     */
    public function update()
    {

    }


}