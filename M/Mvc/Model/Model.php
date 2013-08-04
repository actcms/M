<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Mvc\Model;


use M\Config\Config;
use M\Db\Db;

/**
 * Class Model
 * @package M\Mvc\Model
 */
class Model extends AbstractModel
{
    /**
     * @var
     */
    private $db;
    /**
     * @var
     */
    private $table;
    /**
     * @var
     */
    private $key;
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
        $db = Config::getConfig('db');

        $this->db = new Db($db['driver'],$db['host'],$db['database'],$db['user'],$db['password']);
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
        $result = $this->db->select($sql);
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
     *增加一条记录
     */
    public function add()
    {

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