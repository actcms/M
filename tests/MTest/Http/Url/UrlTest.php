<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

/**
 * Class UrlTest
 */
class UrlTest extends PHPUnit_Framework_TestCase
{
    /**
     * 测试url自动生成工具
     */
    public function testUrlBuild()
    {
        $url = \M\Http\Url\Url::urlBuild('Index','hello','world');
        $url2 = \M\Http\Url\Url::urlBuild('Index','hello');

        $this->assertEquals('?Index/hello/world',$url);
        $this->assertEquals('?Index/hello',$url2);
    }
}
