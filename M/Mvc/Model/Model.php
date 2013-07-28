<?php
/**
 * User: Guowei
 * Date: 13-7-13
 * Time: 下午10:39
 */

namespace M\Mvc\Model;


use M\Db\Db;

class Model extends AbstractModel
{

    private $db;
    private $table;
    private $key;

    private $where;
    protected $order;

    public function init()
    {
        $this->db = new Db('mysql','localhost','m','root','root');
    }

    public function where($where)
    {
        $this->where = $where;
        return $this;
    }

    public function order($order)
    {
        $this->order =$order;
        return $this;
    }

    public function select($sql)
    {
        $result = $this->db->select($sql);
        return $result;
    }

    public function find()
    {

    }

    public function delete()
    {

    }

    public function add()
    {

    }

    public function save()
    {

    }

    public function update()
    {

    }

}