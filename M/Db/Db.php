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
    private $PDO;
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
     * @var Model
     */
    private $Model;
    /**
     * @var SqlBuilder
     */
    private $SqlBuilder;
    /**
     * @var
     */
    private $sql = array();

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
            $this->PDO = new \PDO($this->dsn,$this->user,$this->pwd,array(
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
        $this->SqlBuilder = new SqlBuilder($this->Model,$this->PDO);
    }

    /**
     * @return int
     */
    public function insert()
    {
        $this->sql[] = $sql = $this->SqlBuilder->insertSqlBuild();
        $result = $this->PDO->exec($sql);
        return $result;
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        $this->sql[] = $sql = $this->SqlBuilder->deleteSqlBuild($id);
        $result = $this->PDO->exec($sql);
        return $result;
    }

    /**
     * @return int
     */
    public function update()
    {
        $this->sql[] = $sql = $this->SqlBuilder->updateSqlBuild();
        $result = $this->PDO->exec($sql);
        return $result;
    }

    /**
     * @return array
     */
    public function select()
    {
        $this->sql[] = $sql = $this->SqlBuilder->selectSqlBuild();
        $res = $this->PDO->query($sql);
        $result = $res->fetchAll();
        return $result;
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
            $this->sql[] = $sql = $this->SqlBuilder->findSqlBuild($key,$value);
        }
        else
        {
            $this->sql[] = $sql = $this->SqlBuilder->findByIdSqlBuild($key);
        }

        $res = $this->PDO->query($sql);
        $result = $res->fetch();
        return $result;
    }

    /**
     * @param $sql
     * @return int
     */
    public function exec($sql)
    {
        $result = $this->PDO->exec($sql);
        return $result;
    }

    /**
     * @param $sql
     * @return \PDOStatement
     */
    public function query($sql)
    {
        return $res = $this->PDO->query($sql);
    }

    public function quote($value)
    {
        return $this->PDO->quote($value);
    }

    /**
     * 直接获取PDO对象
     * @return \PDO
     */
    public function getPdo()
    {
        return $this->PDO;
    }

    /**
     * 获取执行的sql语句
     * @return array
     */
    public function getSql()
    {
        return $this->sql;
    }
}