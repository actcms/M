<?php
/**
 * User: Guowei
 * Date: 13-7-27
 * Time: 下午4:39
 */

namespace Mlog\Controller;


use M\Mvc\Controller\Controller;
use Mlog\Model\User as Muser;

class User extends Controller
{
    public function index()
    {
        $user = new Muser();

        $user->setUsername("Jim");
        echo $user->getUsername();
    }
}