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
    private $where;
    /**
     * @var
     */
    protected $order;

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
        $this->where = $where;
        return $this;
    }

    /**
     * @param $order
     * @return $this
     */
    public function order($order)
    {
        $this->order =$order;
        return $this;
    }

    /**
     * @param $sql
     * @return mixed
     */
    public function select($sql)
    {
        $result = self::$db->select($sql);
        return $result;
    }

    /**
     *查出单条记录
     */
    public function find()
    {

    }

    /**
     *删除一条记录
     */
    public function delete()
    {

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

        echo $sql .= ")";
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