<?php
/**
 * User: Guowei
 * Date: 13-7-14
 * Time: 上午10:31
 */

namespace M\Dispatcher;

use M\Http\Request\Request;

use HelloWorld\Controller;

class Dispatcher
{
    private $controller;
    private $action;
    private $parameter;

    private $request;

    public function __construct()
    {
        $this->getRequest();
        $this->getController();
        $this->getAction();

        $index = new Controller\Index();
        $index->index();

        //$this->doRequest();
    }

    public function doRequest()
    {
        if(class_exists($this->controller))
        {
            if(method_exists($this->controller,$this->action))
            {
                $controller = new $this->controller();
                $action = $this->action;
                $controller->$action();
            }
            else
            {
                echo $this->action.' action not find';
            }
        }
        else
        {
            echo $this->controller.' controller not find';

        }
    }

    public function getRequest()
    {
        Request::init();
        $this->request = Request::parseRequest();
    }

    public function getController()
    {
        if(!empty($this->request[0]))
        {
            $this->controller = 'Controller\\'.$this->request[0];
        }
        else
        {
            $this->controller = 'Controller\Index';
        }

        return $this->controller;
    }

    public function getAction()
    {
        if(!empty($this->request[1]))
        {
            $this->action = $this->request[1];
        }
        else
        {
            $this->action = 'index';
        }

        return $this->action;
    }

    public function getParameter()
    {
        return $this->parameter;
    }


}