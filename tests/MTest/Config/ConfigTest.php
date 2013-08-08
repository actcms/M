<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace MTest\Config;


use M\Config\Config;

//include_once '../MTest.php';

class ConfigTest extends \PHPUnit_Framework_TestCase
{
    public $config;

    public function setUp()
    {
        $config = array(
            'db'=>'mysql',
            'user'=>'root',
        );

        $this->config = Config::init($config);

    }

    public function testGetConfig()
    {
        $this->assertEquals('mysql',$this->config->getConfig('db'));
    }


}
