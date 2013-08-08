<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace MTest\Db;

use M\Db\Db;
class DbTest extends \PHPUnit_Framework_TestCase
{
    public $db;

    public function setUp()
    {
        $dsn = 'mysql:host=localhost;dbname=test';
        $user = 'root';
        $password = 'root';

        $this->db = new Db($dsn,$user,$password);
    }

    public function testInsert()
    {
        $sql = "INSERT INTO `test` (`title`,`content`) VALUES ('hello','some word')";

        $result = $this->db->insert($sql);

        $this->assertEquals(true,$result);
    }

    public function testSelect()
    {
        $sql = "SELECT * FROM  test";
        $result = $this->db->select($sql);
        $result = is_array($result);
        $this->assertEquals(true,$result);
    }

    public function testDelete()
    {

    }

    public function tearDown()
    {
        //清理数据表
        $this->db->delete("delete from test");
    }
}
