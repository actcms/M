<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace Mlog\Controller;

use M\Mvc\Controller\Controller;
use Mlog\Model\Post;

/**
 * Class Common
 * @package Mlog\Controller
 */
class Common extends Controller
{
    /**
     * 设置布局
     * @var string
     */
    protected $layout = 'main';    //设置布局

    /**
     *初始化
     */
    public function init()
    {
        $this->getSide();
    }

    /**
     *获取侧边栏内容
     */
    public function getSide()
    {
        $post = new Post();
        $post = $post->orderBy('id')->limit(10)->select();

        $this->assign('recentPost',$post);
    }

    /**
     * 检查用户登录权限
     *
     * 检查是否存在用户session，判断是否为登录用户
     * 如果用户没有登录则跳转到登录页面
     */
    public function checkPower()
    {
        if(empty($_SESSION['username']))
        {
            $this->error('您没有访问权限，请登录后操作',array('Index','login'));
            exit();
        }
    }
}