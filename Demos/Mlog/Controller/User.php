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
            $Page = new Page($Post);
            $this->assign('page', array($Page->getPage(),"User/index/$username"));
            $uid = $user['id'];

            $Post->cols('post.id,post.title,post.content,post.tags,post.author_id,post.create_time,post.top,user.username');
            $Post->join('LEFT JOIN user ON post.author_id=user.id')->where("post.author_id=$uid");
            $post = $Post->order('post.top desc,post.id','desc')->limit($id?($id-1)*5:0,5)->select();

            $this->assign('post',$post);
            $this->display('Index/index');
        }
        else
        {
            $this->error_404();
        }
    }

    /**
     *用户主页
     * 用户需登录后操作
     */
    public function admin()
    {
        $this->checkPower();

        $username = $_SESSION['username'];
        $this->data['title'] = $username.' 的管理主页';

        $User = new Muser();
        $user = $User->find('username',$username);


        $this->assign('user',$user);
        $this->display('User/admin');
    }

    public function user()
    {
        $this->checkPower();

        $this->display('User/user');
    }

    public function setting()
    {
        $this->checkPower();
        $this->display('User/setting');
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
     *获取最近的文章列表，默认显示10篇
     */
    public function getRecentPost()
    {
        $userID = $_SESSION['id'];
        $Post = new Post();
        $recentPost = $Post->where("`author_id`=$userID")->order('id')->limit(10)->select();
        $this->assign('recentPost',$recentPost);
    }

    /**
     *获取标签云，默认显示100条
     */
    public function getTag()
    {
        $post = new Post();
        $tags = $post->getAllTag($_SESSION['id']);
        $this->assign('tags',$tags);
    }
}