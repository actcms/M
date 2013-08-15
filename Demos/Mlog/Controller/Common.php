<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace Mlog\Controller;

use M\Mvc\Controller\Controller;
use Mlog\Model\Post;

class Common extends Controller
{
    public function init()
    {
        $this->getSide();
    }

    public function getSide()
    {
        $post = new Post();
        $post = $post->select();

        $this->assign('recentPost',$post);
    }
}