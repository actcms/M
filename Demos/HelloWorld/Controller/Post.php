<?php
/**
 * User: Guowei
 * Date: 13-7-24
 * Time: 下午12:29
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