<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace Mlog\Model;

use M\Mvc\Model\Model;

class Tag extends Model
{
    protected $id;
    protected $tag;
    protected $number;

    protected $table = 'tag';
    protected $key = 'id';

    protected $data = array(
        'id' => 'id',
        'tag' => 'tag',
        'number' => 'number',
    );

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setTag($tag)
    {
        $this->tag = $tag;
        return $this;
    }

    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }
}