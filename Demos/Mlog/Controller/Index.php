<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace Mlog\Controller;

use M\Extend\Page;
use Mlog\Model\Post;
use Mlog\Model\User;

/**
 * Class Index
 * @package Mlog\Controller
 */
class Index extends Common
{
    /**
     * @var array
     */
    public $data = array(
        'controller' => 'Index',
        'title' => '首页',
        'nav' => array('Index'),
    );
    /**
     * 设置布局
     * @var string
     */
    protected $layout = 'main';

    /**
     *首页
     */
    public function index($id)
    {
        $this->data['nav'] = array('Index','index');

        $post = new Post();
//        $page = new Page($post);
//        echo $page->countPage();
        $post = $post->orderBy('top desc,id','desc')->limit($id?$id*5:0,5)->select();

        $this->assign('post',$post);
        $this->display('Index/index');
    }

    /**
     * 登录
     */
    public function login()
    {
        if(isset($_POST['login']))
        {
            $user = new User();

            $user->get_Post();
            $result = $user->login();
            if($result)
            {
                $this->success($_SESSION['username'].'登录成功',array('Index','index'));
            }
            else
            {
                $this->error('登录失败');
            }
        }
        else
        {
            $this->data['nav'] = array('Index','login');
            $this->display('Index/login');
        }
    }

    /**
     * 注册
     */
    public function reg()
    {
        if(isset($_POST['reg']))
        {
            $user = new User();

            $user->get_Post();
            $result = $user->save();

            if($result)
            {
                $this->success('注册成功',array('Index','index'));
            }
            else
            {
                $this->error('注册失败');
            }
        }
        else
        {
            $this->data['title'] = 'Reg';
            $this->data['nav'] = array('Index','reg');
            $this->display('Index/reg');
        }
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        session_destroy();
        $this->success('退出成功',array('Index','index'));
    }
}