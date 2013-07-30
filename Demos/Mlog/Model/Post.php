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
    private $id;
    private $title;
    private $content;
    private $pdate;

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

    public function getPdate()
    {
        return $this->pdate;
    }

    public function setPdate($pdate)
    {
        $this->pdate = $pdate;
        return $this;
    }

}