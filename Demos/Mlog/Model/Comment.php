<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace Mlog\Model;

use M\Mvc\Model\Model;

class Comment extends Model
{
    protected  $table = 'comment';
    protected $primary_key = 'cid';

    protected $cid;
    protected $username;
    protected $email;
    protected $message;
    protected $createTime;
    protected $postId;

    protected $data = array(
        'cid' => 'cid',
        'username' => 'username',
        'email' =>'email',
        'message' => 'message',
        'create_time' => 'createTime',
        'post_id' => 'postId',
    );

    public function setCid($cid)
    {
        $this->cid = $cid;
        return $this;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
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
        return $this;
    }

    public function setPostId($postId)
    {
        $this->postId = $postId;
        return $this;
    }
}