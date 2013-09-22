<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace MTest\Text;


use M\Base\Text;

class TextTest extends \PHPUnit_Framework_TestCase
{
    public function testSubstr()
    {
        $str = "轻轻的我走了，正如我轻轻的来，挥一挥衣袖，不带走一片云彩";
        $str1 = Text::substr($str,0,20);

        $this->assertEquals('轻轻的我走了，正如我轻轻的来，挥一挥衣袖',$str1);

    }

}
