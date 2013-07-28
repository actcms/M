<?php
/**
 * User: Guowei
 * Date: 13-7-27
 * Time: 下午4:39
 */

namespace Mlog\Controller;


use M\Mvc\Controller\Controller;
use Mlog\Model\User as MUser;

class User extends Controller
{
    public function index()
    {
        $user = new MUser();

        $user = $user->select("select * from m_user");
        print_r($user);
    }
}