<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace Mlog\Controller;

use M\Mvc\Controller\Controller;
use Mlog\Model\Post as MPost;

class Post extends Controller
{
    public function index()
    {
        $this->assign('name','post');
        $this->display('Post/index.php');
    }

    public function add()
    {
        if(isset($_POST['post']))
        {
            $post = new MPost();
            $post->title = $_POST['title'];
            $post->content = $_POST['content'];
            $post->createTime = time();

            $result = $post->add();

            if($result)
            {
                $this->success('发布成功');
            }
            else
            {
                $this->error('发布失败');
            }
        }
        else
        {
            $this->display('Post/add.php');
        }
    }

    public function delete()
    {

    }

    public function update()
    {

    }

}