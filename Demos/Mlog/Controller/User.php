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

        $User = new Muser();
        $user = $User->select();
        $this->assign('user',$user);
        $this->display('User/admin');
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
}