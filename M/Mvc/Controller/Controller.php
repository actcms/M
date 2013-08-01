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
 *
 * 控制器
 *
 * @package M\Mvc\Controller
 */
class Controller extends AbstractController
{
    /**
     * @var View 保存的模板实例
     */
    private $view;

    /**
     *控制器初始化
     */
    public function init()
    {
        $this->view = View::init();
    }

    public function setLayout($layout)
    {
        $this->view->setLayout($layout);
    }

    /**
     * 向视图赋值
     *
     * @param $key 赋值变量
     * @param $value 变量值
     */
    public function assign($key,$value)
    {
        $this->view->assign($key,$value);
    }

    /**
     * 选择要显示的视图模板
     *
     * @param string $tpl 模板路径
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
     * 当操作成功时返回的内容
     * @param string $message 传递的字符消息
     */
    public function success($message)
    {
        echo $message;
    }

    /**
     * 操作失败时返回的内容
     *
     * @param string $message
     */
    public function error($message)
    {
        echo $message;
    }

}