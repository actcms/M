<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace Mlog\Controller;


use M\Extend\Page;
use M\Mvc\Model\Model;
use Mlog\Model\Post;

class Search extends Common
{
    /**
     * @var array
     */
    public $data = array(
        'title' => '搜索',
        'nav' => array('搜索'=>'Search/index'),
    );

    public function index($id)
    {
        if (!empty($_POST['search'])||isset($_SESSION['search']))
        {
            if(!empty($_POST['search']))
            {
                $_SESSION['search'] = $_POST['search'];
            }

            $key = $_SESSION['search'];
            $this->data['title'] = '搜索-- '.$key;
            $Post = new Post();

            $Post->cols('post.id,post.title,post.content,post.tags,post.author_id,post.create_time,post.top,user.username');
            $Post->join('LEFT JOIN user ON post.author_id=user.id');
            $Post->where("`title` LIKE '%$key%' OR `content` LIKE '%$key%' OR `tags` LIKE '%$key%'");

            $Page = new Page($Post);
            $this->assign('page', array($Page->getPage(),'Search/index'));

            $post = $Post->order('post.id','desc')->limit($id?($id-1)*5:0,5)->select();

            $this->assign('post', $post);
            $this->display('Search/index');
        }
        else
        {
            $this->display('Search/search');
        }
    }
}