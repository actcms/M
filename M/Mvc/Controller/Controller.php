<?php
/**
 * User: Guowei
 * Date: 13-7-13
 * Time: 下午10:36
 */

namespace M\Mvc\Controller;

use M\Mvc\View\View;

class Controller extends AbstractController
{
    private $view;

    public function init()
    {
        $this->view = View::init();
    }

    public function assign($key,$value)
    {
        $this->view->assign($key,$value);
    }

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

    public function success($message)
    {
        echo $message;
    }

    public function error($message)
    {
        echo $message;
    }

}