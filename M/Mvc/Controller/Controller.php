<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Mvc\Controller;

use M\Mvc\View\View;

/**
 * Class Controller
 * @package M\Mvc\Controller
 */
class Controller extends AbstractController
{
    /**
     * @var
     */
    private $view;

    /**
     *控制器初始化
     */
    public function init()
    {
        $this->view = View::init();
    }

    /**
     * @param $key
     * @param $value
     */
    public function assign($key,$value)
    {
        $this->view->assign($key,$value);
    }

    /**
     * @param string $tpl
     */
    public function display($tpl='')
    {
        if(!empty($tpl))
        {

        }
        else
        {
            //todo when $tpl is empty
        }

        $this->view->display($tpl);
    }

    /**
     * @param $message
     */
    public function success($message)
    {
        echo $message;
    }

    public function error($message)
    {
        echo $message;
    }

}