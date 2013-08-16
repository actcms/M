<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace Mlog\Controller;

use Mlog\Model\Post;

class Index extends Common
{
    public $data = array(
        'controller' => 'Index',
        'title' => '首页',
    );

    protected $layout = 'test';

    public function index()
    {
        $post = new Post();
        $post->orderBy('id','desc')->limit(0,5);
        $post = $post->select();

        $this->assign('post',$post);
        $this->display('Index/index');
    }

    public function login()
    {
        if(isset($_POST['login']))
        {

        }
        else
        {
            $this->display('Index/login');
        }

    }

    public function reg()
    {
        if(isset($_POST['reg']))
        {

        }
        else
        {
            $this->display('Index/reg');
        }

    }

}