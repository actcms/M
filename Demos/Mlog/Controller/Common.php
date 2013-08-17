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
        $post = $post->orderBy('id')->limit(10)->select();

        $this->assign('recentPost',$post);
    }

    /**
     * 检查用户登录权限
     */
    public function checkPower()
    {
        if(empty($_SESSION['username']))
        {
            $this->error('您没有访问权限，请登录后操作');
            exit();
        }
    }
}