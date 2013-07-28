<?php
/**
 * User: Guowei
 * Date: 13-7-17
 * Time: 下午2:31
 */
namespace M\Db;


class Db
{
    private $db;

    private $drive;
    private $host;
    private $user;
    private $pwd;
    private $database;

    public function __construct($drive,$host,$database,$user,$pwd)
    {
        $this->drive = $drive;
        $this->host = $host;
        $this->user = $user;
        $this->pwd = $pwd;
        $this->database = $database;

        $this->connect();
    }

    public function connect()
    {
        try
        {
            $this->db = new \PDO($this->drive.':host='.$this->host.';dbname='.$this->database,$this->user,$this->pwd);
        }
        catch(\PDOException $e)
        {
            echo '数据库连接错误！'.$e->getMessage();
        }

    }

    public function add($sql)
    {

    }

    public function del($sql)
    {

    }

    public function update($sql)
    {

    }

    public function select($sql)
    {
        $res = $this->db->query($sql);
        $result = $res->fetchAll();
        return $result;

    }



}