<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace Mlog\Controller;

use Mlog\Model\Post as MPost;
use Mlog\Controller\Tag;

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
        'nav' => array('文章'=>''),
    );

    /**
     * @param $id
     */
    public function index($id)
    {
        $id = empty($id)?1:$id;

        $Post = new MPost();
        $post = $Post->join('LEFT JOIN user ON post.author_id=user.id')->findById($id);
        $this->data['title'] = $post['title'];
        $this->data['nav'] = array('文章'=>'Post/index');
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
            $Post = new MPost();

            $Post->get_Post();
            $Post->authorId = $_SESSION['id'];
            $Post->createTime = time();

            $result = $Post->save();
            if($result)
            {
                $this->success('发布成功',array('Post','update',$Post->getPdo()->lastInsertId()));
            }
            else
            {
                $this->error('发布失败');
            }
        }
        else
        {
            $this->data['nav'] = array('文章'=>'Post/index','撰写'=>'Post/add');
            $this->data['title'] = '撰写新文章';
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

        $Post = new MPost();
        $Tag = new Tag();

        $result = $Post->delete($id);
        if($result)
        {
            $this->success('删除成功',array('Index','index'));
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
        $Post = new MPost();

        if(isset($_POST['update']))
        {
            $Post->get_Post();       //一次获取所有属性并赋值到模型属性

            $Post->setAuthorId();
            $Post->setCreateTime();

            $result = $Post->save();

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
            $this->data['nav'] = array('文章'=>'Post/index','更新'=>"Post/update/$id");
            $this->data['title'] = '更新文章';
            $post = $Post->findById($id);
            $this->assign('post',$post);
            $this->display('Post/update');
        }
    }
}