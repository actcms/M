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
        print_r($_POST);
        $this->display('Search/index');
    }
}