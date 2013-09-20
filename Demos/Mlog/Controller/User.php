<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace Mlog\Controller;

use Mlog\Model\Post;
use Mlog\Model\User as MUser;
use M\Extend\Page;
use M\Extend\Upload;
/**
 * Class User
 * @package Mlog\Controller
 */
class User extends Common
{
    //protected $layout = 'user';
    /**
     * @var array
     */
    public $data = array(
        'title' => '用户',
        'nav' => array('用户'=>'User/index'),
    );

    public function init()
    {
        //屏蔽父类默认操作
    }

    /**
     *用户公开显示主页
     */
    public function index($username)
    {
        $username = urldecode($username);
        $id = \M\App::getRequest()->getParameter(3)?\M\App::getRequest()->getParameter(3):1;

        $User = new MUser();
        $user = $User->find('username',$username);
        if($user)
        {
            $this->data['nav'] = array('用户'=>'User/index',$username=>"User/index/$username");
            $this->data['title'] = $username.' 的主页';

            $Post = new Post();
            $uid = $user['id'];

            $Post->cols('post.id,post.title,post.content,post.tags,post.author_id,post.create_time,post.top,user.username');
            $Post->join('LEFT JOIN user ON post.author_id=user.id')->where("post.author_id=$uid");

            $Page = new Page($Post);
            $this->assign('page', array($Page->getPage(),"User/index/$username"));

            $post = $Post->order('post.top desc,post.id','desc')->limit($id?($id-1)*5:0,5)->select();

            $this->assign('post',$post);
            $this->getSide($uid);
            $this->display('User/index');
        }
        else
        {
            $this->error_404();
        }
    }

    public function user()
    {
        $this->checkPower();
        $user = $this->getUserInfo();

        $this->data['title'] = $user['username'].' 的账户信息';

        $this->assign('user', $user);
        $this->getSide($user['id']);
        $this->display('User/user');
    }

    /**
     * 用户文章管理页面
     * @param $id
     */
    public function post($id)
    {
        $this->checkPower();
        $user = $this->getUserInfo();
        $this->data['nav'] = array('用户'=>'User/user',$user['username']=>"User/index/".$user['username']);
        $this->data['title'] = '文章管理';

        $Post = new Post();
        $uid = $user['id'];

        $Post->where("author_id=$uid");

        $Page = new Page($Post);
        $this->assign('page', array($Page->getPage(),"User/post"));

        $post = $Post->order('top desc,id','desc')->limit($id?($id-1)*5:0,5)->select();
        $this->getSide($uid);
        $this->assign('post',$post);
        $this->display('User/post');
    }

    /**
     * 用户资料设置
     */
    public function setting()
    {
        $this->checkPower();
        $user = $this->getUserInfo();

        if(!empty($_POST['setting']))
        {
            $User = new MUser();
            $User->get_Post();
            $User->id = $user['id'];

            $result = $User->save();
            if($result)
            {
                $this->success('修改成功');
            }
            else
            {
                $this->error('修改失败');
            }
        }
        else
        {
            $this->data['nav'] = array('用户'=>'User/user');
            $this->data['title'] = '设置';
            $this->getSide($user['id']);
            $this->assign('user', $user);
            $this->display('User/setting');
        }
    }

    public function upload()
    {
        $this->checkPower();

        if(!empty($_POST['upload']))
        {
            $upload = new Upload('image');
            $upload->setUploadDir(APP.'/Upload/');
            $upload->setFilename(time());
            $res = $upload->up();
            if($res)
            {
                $this->success('上传成功');
            }
            else
            {
                $this->error('上传失败');
            }
        }
    }

    /**
     * 获取登录用户信息
     *
     * @return mixed
     */
    private function getUserInfo()
    {
        $username = $_SESSION['username'];
        $User = new Muser();
        $user = $User->find('username',$username);
        return $user;
    }
}