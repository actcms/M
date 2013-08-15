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
    protected $tags;
    protected $authorId;
    protected $createTime;

    protected $table = 'post';
    protected $key = 'id';

    protected $data = array(
        'id' => 'id',
        'title' => 'title',
        'content' =>'content',
        'tags' => 'tags',
        'author_id' => 'authorId',
        'create_time' => 'createTime',
    );

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
        return $this;
    }

    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;
        return $this;
    }

}