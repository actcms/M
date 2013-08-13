<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace Mlog\Controller;

use M\Mvc\Controller\Controller;

class Tag extends Controller
{
    public function index()
    {
        $this->assign('word','hello world');
        $this->display('Tag/index.php');
    }

}