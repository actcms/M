<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace Mlog\Model;

use M\Mvc\Model\Model;

class Post extends Model
{
    protected $id;
    protected $title;
    protected $content;
    protected $createTime;

    protected $table = 'post';
    protected $key = 'id';

    protected $data = array(
        'id' => 'id',
        'title' => 'title',
        'content' =>'content',
        'create_time' => 'createTime',
    );

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getCreateTime()
    {
        return $this->createTime;
    }

    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;
        return $this;
    }

}