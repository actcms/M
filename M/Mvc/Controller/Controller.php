<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Mvc\Controller;

use M\M;
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
     * 控制器全局变量，所有视图内都可以使用
     * @var array
     */
    protected $data = array();
    /**
     *指定默认布局文件
     * @var string
     */
    protected $layout = 'main';

    /**
     *控制器初始化
     */
    public function __construct()
    {
        $this->view = View::init();         //实例化 View

        parent::__construct();

        $app = M::getConfig('app');
        $this->assign('app',$app);
    }

    public function init()
    {

    }

    /**
     * @param $layout
     */
    public function setLayout($layout)
    {
        $this->view->setLayout($layout);
    }

    /**
     * 设置控制器全局变量
     *
     * 在控制器所有视图中都可以使用
     * @param $data array
     */
    public function setData($data)
    {
        $this->view->setData($data);
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
        $this->setLayout($this->layout);    //设置布局模板
        $this->setData($this->data);        //在渲染视图之前赋值（延迟赋值)

        if(!empty($tpl))
        {
            $tpl = $tpl.'.php';
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

    public function error_404()
    {
        $this->layout = 'error';
        $this->display('Error/404');
    }

}