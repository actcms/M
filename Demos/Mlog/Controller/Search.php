<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace Mlog\Controller;


use M\Mvc\Model\Model;

class Search extends Common
{
    /**
     * @var array
     */
    public $data = array(
        'title' => 'Search',
        'nav' => array('Search'),
    );

    public function index()
    {
        echo $_POST['search'];

        $this->display('Search/index');
    }
}