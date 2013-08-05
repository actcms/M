<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace Mlog\Controller;

use M\App;
use M\Mvc\Controller\Controller;

class Index extends Controller
{

    public function init()
    {
        parent::init();

        $this->assign('app','Mlog');

        $this->setLayout("main");
    }

    public function index()
    {
        $this->assign('word','hello world');
        $this->display('Index/index.php');
    }

    public function login()
    {
        $this->display('Index/login.php');
    }

}