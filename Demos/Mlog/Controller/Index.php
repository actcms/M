<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace Mlog\Controller;

use M\Mvc\Controller\Controller;

class Index extends Controller
{

    public function init()
    {
        parent::init();
        $this->setLayout("main");
    }

    public function index()
    {
        $this->assign('app','Mlog');
        $this->assign('word','hello world');
        $this->display('Index/index.php');
    }

}