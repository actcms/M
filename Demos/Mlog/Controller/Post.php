<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace Mlog\Controller;

use Mlog\Model\Post as MPost;

/**
 * Class Post
 * @package Mlog\Controller
 */
class Post extends Common
{
    /**
     * @var array
     */
    public $data = array(
        'title' => 'Post',
        'nav' => array('Post'),
    );

    /**
     * @param $id
     */
    public function index($id)
    {
        $id = empty($id)?1:$id;

        $post = new MPost();
        $post = $post->find($id);

        $this->data['title'] = $post['title'];
        $this->data['nav'] = array('Post','index');
        $this->assign('page',$id);
        $this->assign('post',$post);
        $this->display('Post/index');
    }

    /**
     *添加文章
     */
    public function add()
    {
        $this->checkPower();

        if(isset($_POST['post']))
        {
            $post = new MPost();

            $post->get_Post();
            $post->authorId = $_SESSION['id'];
            $post->createTime = time();

            $result = $post->save();

            if($result)
            {
                $this->success('发布成功',array('Post','update',$post->getPdo()->lastInsertId()));
            }
            else
            {
                $this->error('发布失败');
            }
        }
        else
        {
            $this->data['nav'] = array('Post','add');
            $this->assign('title','ADD POST');
            $this->display('Post/add');
        }
    }

    /**
     * 删除文章
     * @param $id
     */
    public function delete($id)
    {
        $this->checkPower();

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

    /**
     * 更新文章
     * @param $id
     */
    public function update($id)
    {
        $this->checkPower();
        $post = new MPost();


        if(isset($_POST['update']))
        {
            $post->get_Post();       //一次获取所有属性并赋值到模型属性

            $post->authorId = 1;
            $post->createTime = time();

            $result = $post->save();

            if($result)
            {
                $this->success('更新成功');
            }
            else
            {
                $this->error('更新失败');
            }
        }
        else
        {
            $this->data['nav'] = array('Post','update');
            $this->assign('title','UPDATE POST');
            $post = $post->find($id);
            $this->assign('post',$post);
            $this->display('Post/update');
        }

    }

}