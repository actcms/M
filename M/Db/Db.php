<?php
/**
 * User: Guowei
 * Date: 13-7-17
 * Time: 下午2:31
 */
namespace M\Db;

/**
 * Class Db
 * @package M\Db
 */
class Db
{
    /**
     * @var
     */
    private $db;
    /**
     * @var
     */
    private $drive;
    /**
     * @var
     */
    private $host;
    /**
     * @var
     */
    private $user;
    /**
     * @var
     */
    private $pwd;
    /**
     * @var
     */
    private $database;

    /**
     * @param $drive
     * @param $host
     * @param $database
     * @param $user
     * @param $pwd
     */
    public function __construct($drive,$host,$database,$user,$pwd)
    {
        $this->drive = $drive;
        $this->host = $host;
        $this->user = $user;
        $this->pwd = $pwd;
        $this->database = $database;

        $this->connect();
    }

    /**
     *
     */
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

    /**
     * @param $sql
     */
    public function add($sql)
    {

    }

    /**
     * @param $sql
     */
    public function del($sql)
    {

    }

    /**
     * @param $sql
     */
    public function update($sql)
    {

    }

    /**
     * @param $sql
     * @return mixed
     */
    public function select($sql)
    {
        $res = $this->db->query($sql);
        $result = $res->fetchAll();
        return $result;

    }
}