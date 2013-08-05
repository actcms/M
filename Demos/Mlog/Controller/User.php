<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace Mlog\Controller;


use M\Mvc\Controller\Controller;
use Mlog\Model\User as MUser;

class User extends Controller
{
    public function index()
    {
        $user = new MUser('user');

        $user = $user->select("select * from user");
        print_r($user);
    }
}