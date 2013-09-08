<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace Mlog\Controller;

use Mlog\Model\Tag as MTag;
/**
 * Class Tag
 * @package Mlog\Controller
 */
class Tag extends Common
{
    public function index()
    {
        $this->assign('word','hello world');
        $this->display('Tag/index');
    }

    public function add()
    {

    }

    public function addAll($tags)
    {
        $tags = explode(',',$tags);
        $Tag = new MTag();
        foreach($tags as $tag)
        {
            $Tag->tag = $tag;
            $Tag->number = 1;
            $Tag->save();
        }
    }
}