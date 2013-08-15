<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace Mlog\Controller;

use Mlog\Model\Post as MPost;

class Post extends Common
{
    public $data = array(
        'title' => 'Post',
    );
    public function index($id)
    {
        $id = empty($id)?1:$id;

        $post = new MPost();
        $post = $post->find($id);

        $this->data['title'] = $post['title'];

        $this->assign('post',$post);
        $this->display('Post/index.php');
    }

    public function add()
    {
        if(isset($_POST['post']))
        {
            $post = new MPost();
            $post->title = $_POST['title'];
            $post->content = $_POST['content'];
            $post->tags = $_POST['tags'];
            $post->authorId = 1;
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
            $this->assign('title','ADD POST');
            $this->display('Post/add.php');
        }
    }

    public function delete($id)
    {
        $post = new MPost();
        $result = $post->delete($id);
        if($result)
        {
            $this->success('删除成功');
        }
        else
        {
            $this->error('删除失败');
        }
    }

    public function update($id)
    {
        $post = new MPost();


        if(isset($_POST['update']))
        {

        }
        else
        {
            $this->assign('title','UPDATE POST');
            $post = $post->find($id);
            $this->assign('post',$post);
            $this->display('Post/update.php');
        }

    }

}