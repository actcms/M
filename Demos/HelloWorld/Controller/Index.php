<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace HelloWorld\Controller;

use M\M;
use M\Mvc\Controller\Controller;

class Index extends Controller
{
    public function index()
    {
        echo \M\App::getUrl();
        //$this->success("it works");
        //echo \M\App::getUrl()urlBuild('Index','hello',1);
    }

    public function hello()
    {
        $this->success("hello world");
    }
}