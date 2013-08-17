<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author: Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Dispatcher;

use M\M;
use M\Http\Request\AbstractRequest;
use M\Mvc\Controller\Controller;

/**
 * Class Dispatcher
 *
 * 对用户请求进行调度
 *
 * @package M\Dispatcher
 */
class Dispatcher
{
    /**
     * @var string 控制器
     */
    private $controller;
    /**
     * @var string 动作
     */
    private $action;
    /**
     * @var array 参数数组
     */
    private $parameter;
    /**
     * @var array 用户请求命令的数组
     */
    private $request;

    /**
     *构造方法
     */
    public function __construct(AbstractRequest $request)
    {
        //获取传入的请求
        $this->request = $request->requests;

        $this->init();

        $config = M::getConfig('app');         //get the app configs
        $appBasePath = $config['basePath'];         //get the app basePath

        $this->controller = $appBasePath.'\Controller\\'.$this->controller;

        $this->doRequest();

    }

    /**
     *请求初始化操作
     */
    private function init()
    {
        $this->getController();
        $this->getAction();
        $this->getParameter();
    }

    /**
     *处理请求
     */
    public function doRequest()
    {
        if(class_exists($this->controller))
        {
            $controller = new $this->controller();

            if(method_exists($this->controller,$this->action))
            {
                $controller->{$this->action}($this->parameter);
            }
            else
            {
                $controller->error_404();
            }
        }
        else
        {
            $controller = new Controller();
            $controller->error_404();

        }
    }

    /**
     * 从请求中获取控制器
     *
     * @return string
     */
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

    /**
     * 从请求中获取动作
     *
     * @return string
     */
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

    /**
     * @return string 获取参数数组
     */
    public function getParameter()
    {
        if(!empty($this->request[2]))
        {
            $this->parameter = $this->request[2];
        }
        else
        {
            $this->request = '';
        }

        return $this->parameter;
    }

}