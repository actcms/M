<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Db;

/**
 * Class Db
 *
 * 利用PDO对数据库操作
 *
 * @package M\Db
 */
class Db
{
    /**
     * @var \PDO 数据库连接实例
     */
    private $db;
    /**
     * @var string 数据库类别
     */
    private $drive;

    /**
     * @var string 数据库名
     */
    private $database;
    /**
     * @var string 数据库主机地址
     */
    private $host;
    /**
     * @var string 数据库用户名
     */
    private $user;
    /**
     * @var string 数据库用户密码
     */
    private $pwd;

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
     *建立数据库连接
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
            exit();
        }

    }

    /**
     * 向数据库添加一条记录
     *
     * @param $sql  string
     */
    public function add($sql)
    {

    }

    /**
     *删除数据库中一条记录
     *
     * @param $sql string
     */
    public function del($sql)
    {

    }

    /**
     * 更新数据库中的一条记录
     *
     * @param $sql string
     */
    public function update($sql)
    {

    }

    /**
     * 查询数据库中的记录
     *
     * @param $sql string
     * @return mixed
     */
    public function select($sql)
    {
        $res = $this->db->query($sql);
        $result = $res->fetchAll();
        return $result;

    }
}