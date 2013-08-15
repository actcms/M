<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace Mlog\Controller;

class Tag extends Common
{
    public function index()
    {
        $this->assign('word','hello world');
        $this->display('Tag/index.php');
    }

}