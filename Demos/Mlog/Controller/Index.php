<?php
/**
 * User: Guowei
 * Date: 13-7-25
 * Time: 上午11:54
 */

namespace Mlog\Controller;

use M\Mvc\Controller\Controller;

class Index extends Controller
{
    public function index()
    {
        $this->assign('app','Mlog');
        $this->display('Index/index.php');
    }

}