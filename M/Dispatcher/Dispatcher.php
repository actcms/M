<?php
/**
 * User: Guowei
 * Date: 13-7-14
 * Time: 上午10:31
 */

namespace M\Dispatcher;


use M\Http\Request\Request;

class Dispatcher
{
    private $controller;
    private $action;
    private $parameter;

    private $request;

    public function __construct()
    {
        $this->doRequest();
    }

    public function doRequest()
    {
        $this->getRequest();
        $this->getController();
        $this->getAction();

        if(class_exists($this->controller))
        {
            if(method_exists($this->controller,$this->action))
            {
                $controller = new $this->controller;
                $action = $this->action;
                $controller->$action();
            }
            else
            {
                echo 'action not find';
            }
        }
        else
        {
            echo 'controller not find';
        }


    }

    public function getRequest()
    {
        $this->request = Request::parseRequest();
    }

    public function getController()
    {
        if(!empty($this->request[0]))
        {
            $this->controller = $this->request[0];
        }
        else
        {
            $this->controller = 'Index';
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