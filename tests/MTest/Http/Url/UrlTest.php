<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace MTest\Http\Url;


use M\Http\Server\Server;
use M\Http\Url\Url;

class UrlTest extends \PHPUnit_Framework_TestCase
{
    public function testUrlBuild()
    {
        Url::$mode = '?';

        $url = Url::urlBuild('Index','index','1');

        $assertUrl = Server::getHomeUrl().'?Index/index/1';

        $this->assertEquals($assertUrl,$url);
    }

}
