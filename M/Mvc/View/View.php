<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Mvc\View;

use M\M;

/**
 * Class View
 * @package M\Mvc\View
 */
class View extends AbstractView
{
    /**
     * @var array
     */
    public $data = array();
    /**
     * @var string 模板布局
     */
    private static $layout;
    /**
    * @var string 模板视图的默认根路径
    */
    private static $viewPath;
    /**
     * @var array 模板可以使用的所有变量
     */
    private $var = array();

    /**
     * 初始化
     *
     * @return View
     */
    public static function init()
    {
        self::$viewPath =  APP.'/View/';

        return new View();

    }

    /**
     * 模板标量赋值
     *
     * @param $key 赋值变量
     * @param $value 变量的值
     */
    public function assign($key,$value)
    {
        $this->var[$key] = $value;
    }

    /**
     * 选择要显示的视图模板
     *
     * 当视图布局文件不存在时直接加载视图文件
     *
     * @param string $tpl 模板文件路径
     * @throws Exception
     */
    public function display($tpl)
    {
        $name = array_keys($this->var);
        foreach($name as $key)
        {
            $$key=$this->var[$key];
        }

        $tpl = self::$viewPath.$tpl;

        $layout = self::$viewPath.'Layout/'.self::$layout.'.php';
        if(file_exists($tpl))
        {
            if(file_exists($layout))
            {
                include_once $layout;
            }
            else
            {
                include_once $tpl;
            }
        }
        else
        {
            throw new Exception('file '.$tpl.' not find');
        }

    }

    /**
     * 获取布局文件
     * @return string
     */
    public function getLayout()
    {
        return self::$layout;
    }

    /**
     * 设置布局文件
     * @param $layout
     */
    public function setLayout($layout)
    {
        self::$layout = $layout;
    }

    /**
     * 设置控制器全局数据
     * @param $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }


}