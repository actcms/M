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
     * @var string dsn
     */
    private $dsn;
    /**
     * @var string 数据库用户名
     */
    private $user;
    /**
     * @var string 数据库用户密码
     */
    private $pwd;

    /**
     * @param $dsn
     * @param $user
     * @param $pwd
     */
    public function __construct($dsn,$user,$pwd)
    {
        $this->dsn = $dsn;
        $this->user = $user;
        $this->pwd = $pwd;

        $this->connect();
    }

    /**
     *建立数据库连接
     */
    public function connect()
    {
        try
        {
            $this->db = new \PDO($this->dsn,$this->user,$this->pwd,array(
                \PDO::ATTR_PERSISTENT => true));
        }
        catch(\PDOException $e)
        {
            echo '数据库连接错误！'.$e->getMessage();
            exit();
        }
    }

    /**
     * @param $sql
     * @return int
     */
    public function exec($sql)
    {
        $result = $this->db->exec($sql);
        return $result;
    }

    /**
     * @param $sql
     * @return int
     */
    public function insert($sql)
    {
        $result = $this->db->exec($sql);
        return $result;
    }

    /**
     * @param $sql
     * @return int
     */
    public function delete($sql)
    {
        $result = $this->db->exec($sql);
        return $result;
    }

    /**
     * @param $sql
     * @return int
     */
    public function update($sql)
    {
        $result = $this->db->exec($sql);
        return $result;
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

    /**
     * @param $sql
     * @return mixed
     */
    public function find($sql)
    {
        $res = $this->db->query($sql);
        $result = $res->fetch();
        return $result;

    }

    /**
     * 直接获取PDO对象
     * @return \PDO
     */
    public function getPdo()
    {
        return $this->db;
    }
}