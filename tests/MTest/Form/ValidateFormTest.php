<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace MTest\Form;


use M\Base\Filter;

class FilterTest extends \PHPUnit_Framework_TestCase
{

    public function emailProvider()
    {
        return array(
            array('9999@qq.com'),
            array('aabc@163.com'),
            array('33fgg@kk.net'),
            array('33fgg@kk.net.io'),
        );
    }

    /**
     * @dataProvider emailProvider
     */
    public function testEmail($email)
    {
        $this->assertTrue(Filter::email($email));
        $this->assertFalse(Filter::email('kkkkkkkkkkkk'));
        $this->assertFalse(Filter::email('kkkk@.com'));
        $this->assertFalse(Filter::email('kkk@ll.'));
        $this->assertFalse(Filter::email('kkk.net'));
    }

    public function testNumber()
    {
        $this->assertTrue(Filter::number(123));
        $this->assertTrue(Filter::number('123'));
        $this->assertFalse(Filter::number('hello'));
    }

}
