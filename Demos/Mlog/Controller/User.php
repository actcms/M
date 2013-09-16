<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace Mlog\Controller;

use Mlog\Model\User as MUser;
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
        'title' => 'User',
        'nav' => array('User'),
    );

    /**
     *用户公开显示主页
     */
    public function index($username)
    {
        $this->data['nav'] = array('User',$username);

        $User = new MUser();
        $user = $User->find('username',$username);
        $this->assign('user',$user);
        $this->display('User/index');
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