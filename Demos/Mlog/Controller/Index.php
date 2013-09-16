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
        'nav' => array(
            '首页' => 'Index/index',
        ),
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
        //$this->data['nav'] = array('首页');

        $Post = new Post();

        $page = new Page($Post);
        $this->assign('page', $page->getPage());

        $Post->join('LEFT JOIN user ON post.author_id=user.id');
        $post = $Post->order('post.top desc,post.id','desc')->limit($id?($id-1)*5:0,5)->select();
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
            $User = new User();

            $User->get_Post();
            $result = $User->login();
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
            $this->data['nav'] = array('首页','登录');
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
            $User = new User();

            $User->get_Post();
            $result = $User->save();

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
            $this->data['nav'] = array('首页','注册');
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