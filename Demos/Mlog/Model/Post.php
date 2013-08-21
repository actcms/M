<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace Mlog\Model;

use M\Mvc\Model\Model;

/**
 * Class Post
 * @package Mlog\Model
 */
class Post extends Model
{
    /**
     * @var
     */
    protected $id;
    /**
     * @var
     */
    protected $title;
    /**
     * @var
     */
    protected $content;
    /**
     * @var
     */
    protected $tags;
    /**
     * @var
     */
    protected $authorId;
    /**
     * @var
     */
    protected $createTime;
    /**
     * @var string
     */
    protected $table = 'post';
    /**
     * @var string
     */
    protected $key = 'id';
    /**
     * @var array
     */
    protected $data = array(
        'id' => 'id',
        'title' => 'title',
        'content' =>'content',
        'tags' => 'tags',
        'author_id' => 'authorId',
        'create_time' => 'createTime',
    );

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @param $tags
     * @return $this
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @param $authorId
     * @return $this
     */
    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
        return $this;
    }

    /**
     * @param $createTime
     * @return $this
     */
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;
        return $this;
    }

}