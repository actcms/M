<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace Mlog\Controller;
use Mlog\Model\Comment as MComment;

class Comment extends Common
{
    public $data = array(
        'title' => 'Post',
        'nav' => array('评论'=>''),
    );

    /**
     * 根据传入的文章id,返回该id的所有评论
     * 返回评论格式为 json
     * @param int $id
     */
    public function index($id=1)
    {
        $this->layout = '';
        $Comment = new MComment();
        $comment = $Comment->where("post_id = $id")->select();
        $json =  json_encode($comment);
        echo $json;
    }

    public function add($id)
    {
        if(isset($_POST['comment']))
        {
            $Comment = new MComment();

            $Comment->get_Post();
            $Comment->createTime = time();

            $result = $Comment->save();
            $Comment->getSql(true);
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
            $this->data['nav'] = array('文章'=>'Comment/index','撰写'=>'Comment/add');
            $this->data['title'] = '添加评论';
            $postId = isset($id)?$id:1;
            $this->assign('postId', $postId);
            $this->display('Comment/add');
        }
    }
}