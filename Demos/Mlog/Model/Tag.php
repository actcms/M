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
     * @var
     */
    protected $id;
    /**
     * @var
     */
    protected $tag;
    /**
     * @var
     */
    protected $number;
    /**
     * @var string
     */
    protected $table = 'tag';
    /**
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