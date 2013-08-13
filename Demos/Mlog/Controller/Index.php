<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace Mlog\Controller;

use M\Mvc\Controller\Controller;
use Mlog\Model\Post;

class Index extends Controller
{
    public $data = array(
        'controller' => 'Index',
        'title' => '首页',
    );
    protected $layout = 'test';

    public function index()
    {
        $post = new Post();
        $post = $post->select();

        $this->assign('post',$post);
        $this->display('Index/index.php');
    }

    public function login()
    {
        if(isset($_POST['login']))
        {

        }
        else
        {
            $this->display('Index/login.php');
        }

    }

    public function reg()
    {
        if(isset($_POST['reg']))
        {

        }
        else
        {
            $this->display('Index/reg.php');
        }

    }

}