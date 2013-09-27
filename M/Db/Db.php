<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Db;
use M\Mvc\Model\Model;

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

    private $Model;
    /**
     * @var SqlBuilder
     */
    private $SqlBuilder;

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
                \PDO::ATTR_PERSISTENT => true,
                \PDO::MYSQL_ATTR_INIT_COMMAND =>  "SET NAMES 'UTF8'",       //设置编码方式
            ));
        }
        catch(\PDOException $e)
        {
            echo '数据库连接错误！'.$e->getMessage();
        }
    }

    public function setModel(Model $Model)
    {
        $this->Model = $Model;
        $this->SqlBuilder = new SqlBuilder($this->Model);
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
     * @return int
     */
    public function insert()
    {
        $sql = $this->SqlBuilder->insertSqlBuild();
        $result = $this->db->exec($sql);
        return $result;
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        $sql = $this->SqlBuilder->deleteSqlBuild($id);
        $result = $this->db->exec($sql);
        return $result;
    }

    /**
     * @return int
     */
    public function update()
    {
        $sql = $this->SqlBuilder->updateSqlBuild();
        $result = $this->db->exec($sql);
        return $result;
    }

    /**
     * @return array
     */
    public function select()
    {
        $sql = $this->SqlBuilder->selectSqlBuild();
        $res = $this->db->query($sql);
        $result = $res->fetchAll();
        return $result;
    }

    /**
     * @param $sql
     * @return \PDOStatement
     */
    public function query($sql)
    {
        return $res = $this->db->query($sql);
    }

    /**
     * @param $key
     * @param string $value
     * @return mixed
     */
    public function find($key,$value = '')
    {
        if($value != '')
        {
            $sql = $this->SqlBuilder->findSqlBuild($key,$value);
        }
        else
        {
            $sql = $this->SqlBuilder->findByIdSqlBuild($key);
        }

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