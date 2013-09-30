<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace Mlog\Model;

use M\Base\Filter;
use M\Mvc\Model\Model;

class Comment extends Model
{
    protected  $table = 'comment';
    protected $primary_key = 'c_id';

    protected $cid;
    protected $username;
    protected $email;
    protected $message;
    protected $createTime;
    protected $postId;

    protected $data = array(
        'c_id' => 'cid',
        'username' => 'username',
        'email' =>'email',
        'message' => 'message',
        'create_time' => 'createTime',
        'post_id' => 'postId',
    );

    /**
     * 数据自动完成
     */
    protected function autoComplete()
    {
        $this->setCreateTime();
    }

    public function setCid($cid)
    {
        $this->cid = $cid;
        return $this;
    }

    public function setUsername($username)
    {
        if(Filter::length($username,4) && Filter::word($username,true))
        {
            $this->username = $username;
        }
        else
        {
            return false;
        }
    }

    public function setEmail($email)
    {
        if(Filter::email($email))
        {
            $this->email = $email;
        }
        else
        {
            return false;
        }
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setCreateTime($createTime='')
    {
        if(empty($createTime))
        {
            $this->createTime = time();
        }
        else
        {
            $this->createTime = $createTime;
        }
    }

    public function setPostId($postId)
    {
        $this->postId = $postId;
    }

    public function getComment($pid)
    {
        $comment = $this->where("`post_id`=$pid")->select();
        return $comment;
    }
}