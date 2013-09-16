<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace Mlog\Controller;


use M\Extend\Page;
use Mlog\Model\Post;

class Tag extends Common
{
    /**
     * @var array
     */
    public $data = array(
        'title' => '',
        'nav' => array('标签'=>'Tag/index'),
    );

    public function index($tag)
    {
        $tag = urldecode($tag);
        $this->data['title'] = $tag;
        $this->data['nav'] = array('标签'=>'Tag/index',$tag=>"Tag/index/$tag");

        $Post = new Post();
        $Page = new Page($Post);
        $this->assign('page',$Page->getPage());

        $post = $Post->join('LEFT JOIN user ON post.author_id=user.id')->where("`tags` LIKE '%$tag%'")->order('post.id', 'desc')->limit(5)->select();
        $this->assign('post', $post);
        $this->display('Tag/index');
    }
}