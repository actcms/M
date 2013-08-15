<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace Mlog\Controller;

use Mlog\Model\User as MUser;

class User extends Common
{
    public $data = array(
        'title' => 'User',
    );
    public function index()
    {
        $user = new MUser();
        $user = $user->select();
        $this->assign('user',$user);
        $this->display('User/index');
    }
}