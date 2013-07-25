<?php
/**
 * User: Guowei
 * Date: 13-7-14
 * Time: 上午10:31
 */

namespace M\Dispatcher;

use M\Config\Config;
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
        $this->init();

        $config = Config::getConfig('app');         //get the app configs
        $appBasePath = $config['basePath'];         //get the app basePath

        $this->controller = $appBasePath.'\Controller\\'.$this->controller;

        $this->doRequest();

    }

    private function init()
    {
        $this->getRequest();
        $this->getController();
        $this->getAction();
    }

    public function doRequest()
    {
        if(class_exists($this->controller))
        {
            if(method_exists($this->controller,$this->action))
            {
                $controller = new $this->controller();

                //$controller = new $this->controller;          //this is also true,but I don't know why?

                $controller->{$this->action}();
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