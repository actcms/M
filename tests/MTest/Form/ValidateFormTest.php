<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace MTest\Form;


use M\Form\ValidateForm;

class ValidateFormTest extends \PHPUnit_Framework_TestCase
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
        $this->assertTrue(ValidateForm::email($email));
        $this->assertFalse(ValidateForm::email('kkkkkkkkkkkk'));
        $this->assertFalse(ValidateForm::email('kkkk@.com'));
        $this->assertFalse(ValidateForm::email('kkk@ll.'));
        $this->assertFalse(ValidateForm::email('kkk.net'));
    }

    public function testNumber()
    {
        $this->assertTrue(ValidateForm::number(123));
        $this->assertTrue(ValidateForm::number('123'));
        $this->assertFalse(ValidateForm::number('hello'));
    }

}
