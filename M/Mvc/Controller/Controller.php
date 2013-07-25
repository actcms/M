<?php
/**
 * User: Guowei
 * Date: 13-7-13
 * Time: 下午10:36
 */

namespace M\Mvc\Controller;


class Controller extends AbstractController
{
    private $view;


    public function assign()
    {

    }

    public function display($tpl='')
    {
        if(!empty($tpl))
        {

        }
        else
        {

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