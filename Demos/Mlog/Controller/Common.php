<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace Mlog\Controller;

use M\Mvc\Controller\Controller;
use Mlog\Model\Post;
use Mlog\Model\Tag;

/**
 * 共用控制器
 *
 * 所有控制器都可直接继承Common
 *
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

    public $data = array(
        'nav' => '',
    );

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
        $this->getRecentPost();
        $this->getTag();
    }

    /**
     *获取最近的文章列表，默认显示10篇
     */
    public function getRecentPost()
    {
        $Post = new Post();
        $recentPost = $Post->order('id')->limit(10)->select();

        $this->assign('recentPost',$recentPost);
    }

    /**
     *获取标签云，默认显示100条
     */
    public function getTag()
    {
        $post = new Post();
        $tags = $post->getAllTag();
        $tags = array_count_values($tags);
        $this->assign('tags',$tags);
    }

    /**
     * 检查用户登录权限
     *
     * 检查是否存在用户session，判断是否为登录用户，如果用户没有登录则跳转到登录页面
     * 检查用户要操作的数据是否是自己创建的，如果不是，则不具备操作权限，返回失败提醒
     */
    public function checkPower($id='')
    {
        if(empty($_SESSION['username']))
        {
            $this->error('您没有访问权限，请登录后操作',array('Index','login'));
            exit();
        }
        else if($_SESSION[username] == 'admin')
        {
            //pass
        }
        else
        {
            if(!empty($id))
            {
                $Post = new Post();
                $post = $Post->findById($id);
                if($post['author_id'] != $_SESSION['id'])
                {
                    $this->error('您不具备操作权限');
                }
            }
        }

    }
}