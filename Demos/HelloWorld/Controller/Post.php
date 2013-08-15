<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace HelloWorld\Controller;

use M\Mvc\Controller\Controller;

class Post extends Controller
{
    public function index()
    {
        $this->success("this is the post");

    }
}