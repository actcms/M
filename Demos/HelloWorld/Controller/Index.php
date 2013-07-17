<?php
/**
 * User: Guowei
 * Date: 13-7-13
 * Time: 下午10:56
 */

namespace HelloWorld\Controller;

use M\Mvc\Controller\Controller;

class Index extends Controller
{
    public function index()
    {
        $this->success("good");

    }
}