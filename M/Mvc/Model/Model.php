<?php
/**
 * User: Guowei
 * Date: 13-7-13
 * Time: 下午10:39
 */

namespace M\Mvc\Model;


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
     *
     */
    public function init()
    {
        $this->db = new Db('mysql','localhost','m','root','root');
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
     *
     */
    public function find()
    {

    }

    /**
     *
     */
    public function delete()
    {

    }

    /**
     *
     */
    public function add()
    {

    }

    /**
     *
     */
    public function save()
    {

    }

    /**
     *
     */
    public function update()
    {

    }

}