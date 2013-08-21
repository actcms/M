<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace Mlog\Controller;

use Mlog\Model\User as MUser;

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
    );

    /**
     *用户公开显示主页
     */
    public function index()
    {
        $user = new MUser();
        $user = $user->select();
        $this->assign('user',$user);
        $this->display('User/index');
    }

    /**
     *用户主页
     * 用户需登录后操作
     */
    public function admin()
    {
        $user = new Muser();
        $user = $user->select();
        $this->assign('user',$user);
        $this->display('User/admin');
    }
}