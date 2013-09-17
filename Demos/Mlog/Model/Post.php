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
     * 标题
     * @var
     */
    protected $title;
    /**
     * 内容
     * @var
     */
    protected $content;
    /**
     * 标签
     * @var
     */
    protected $tags;
    /**
     * 作者id
     * @var
     */
    protected $authorId;
    /**
     * 文章生成时间
     * @var
     */
    protected $createTime;
    /**
     * 是否置顶
     * 默认不置顶，值为0，可以修改为1则置顶
     * @var
     */
    protected $top;
    /**
     * 数据库表名
     * @var string
     */
    protected $table = 'post';
    /**
     * 数据库主键
     * @var string
     */
    protected $primary_key = 'id';
    /**
     * 数据库与表单对应关系映射
     * @var array
     */
    protected $data = array(
        'id' => 'id',
        'title' => 'title',
        'content' =>'content',
        'tags' => 'tags',
        'author_id' => 'authorId',
        'create_time' => 'createTime',
        'top' => 'top',
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
        $this->content = htmlspecialchars($content);
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
    public function setAuthorId($authorId = '')
    {
        if(empty($authorId))
        {
            $this->authorId = $_SESSION['id'];
        }
        else
        {
            $this->authorId = $authorId;
        }
        return $this;
    }

    /**
     * @param $createTime
     * @return $this
     */
    public function setCreateTime($createTime = '')
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

    /**
     * 文章置顶
     * 默认为0,不置顶
     *
     * @param $value
     * @return $this
     */
    public function setTop($value)
    {
        if(empty($value))
        {
            $this->top = '0';
        }
        {
            $this->top = $value;
        }

        return $this;
    }

    /**
     * 返回所有标签
     * @return array
     */
    public function getAllTag()
    {
        $tags = '';
        $post = $this->select('tags');

        foreach($post as $p)
        {
            $tags .= $p['tags'].',';
        }

        $tags = rtrim($tags, ',');
        $tags = explode(',',$tags);
        return $tags;
    }
}