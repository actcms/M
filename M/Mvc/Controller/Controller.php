<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Mvc\Controller;

use M\Log\Log;
use M\M;
use M\Mvc\View\View;
use M\Http\Url\UrlHelper;
use M\Mvc\View\Exception;

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
     * @throws \Exception|\M\Mvc\View\Exception
     */
    public function display($tpl='')
    {
        $this->view->setLayout($this->layout);    //设置布局模板
        $this->view->setData($this->data);        //在渲染视图之前赋值（延迟赋值)

        if(!empty($tpl))
        {
            $tpl = $tpl.'.php';
        }
        else
        {
            //todo when $tpl is empty
        }

        try
        {
            $this->view->display($tpl);
        }
        catch (Exception $e)
        {
            throw $e;
        }
    }

    /**
     * 当操作成功时返回的内容
     * @param string $message 传递的字符消息
     * @param array $url
     */
    public function success($message,Array $url=null)
    {
        UrlHelper::success($message,$url);
    }

    /**
     * 操作失败时返回的内容
     *
     * @param string $message
     * @param array $url
     */
    public function error($message,Array $url=null)
    {
        UrlHelper::error($message,$url);
    }

    /**
     * 设置404错误页
     */
    public function error_404($message='')
    {
        header("HTTP/1.0 404 Not Found");
        try
        {
            $this->layout = 'error';
            $this->display('Error/404');
        }
        catch(\M\Mvc\View\Exception $e)
        {
            echo '<h1>404 NOT FOUND</h1>';          //default 404 page if 404 page not be set in app
        }
        Log::error_404($message);

        exit();
    }
}