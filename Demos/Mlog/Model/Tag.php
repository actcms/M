<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace Mlog\Model;

use M\Mvc\Model\Model;

/**
 * Class Tag
 * @package Mlog\Model
 */
class Tag extends Model
{
    /**
     * 标签id
     * @var
     */
    protected $id;
    /**
     * tag name
     * @var
     */
    protected $tag;
    /**
     * the number of the tag
     * @var
     */
    protected $number;
    /**
     * database table
     * @var string
     */
    protected $table = 'tag';
    /**
     * table key
     * @var string
     */
    protected $key = 'id';
    /**
     * @var array
     */
    protected $data = array(
        'id' => 'id',
        'tag' => 'tag',
        'number' => 'number',
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
     * @param $tag
     * @return $this
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
        return $this;
    }

    /**
     * @param $number
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    
}