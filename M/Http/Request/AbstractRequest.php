<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Http\Request;
use M\Base\Filter;

/**
 * Class AbstractRequest
 * @package M\Http\Request
 */

abstract class AbstractRequest
{
    /**
     * 原始请求
     * @var string
     */
    private $rawRequests;
    /**
     * 处理后的请求
     * @var array
     */
    private $requests;

    /**
    * @return mixed
    */
    abstract public function init();

    /**
     * @return mixed
     */
    abstract public function parseRequest();

    /**
     * 构造方法
     */
    public function __construct()
    {
        $this->init();
        $this->parseRequest();
    }

    /**
     * 获取实例
     * @return static
     */
    public static function getRequest()
    {
        return new static();
    }

    /**
     * 获取请求
     * @return array
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * 设置请求
     *
     * 过滤掉除字母数字与汉字之外的请求
     * 控制器首字母大写
     *
     * @param $value array
     */
    public function setRequests($value)
    {
        //初始化空请求数组
        $values = array();

        foreach($value as $parameter)
        {
            $parameter = urldecode($parameter);                 //url解码
            $parameter = strtolower($parameter);                //所有英字母转换为小写，便于统一控制

            $matches = Filter::word($parameter);                //过滤除字母、汉字和数字之外的字符
            if(!$matches)
            {
                $values[] = '';         //如果没有匹配，则触发默认控制器或动作
            }
            else
            {
                $values[] = $matches[0];
            }
        }

        $values[0] = ucfirst($values[0]);     //控制器首字母大写
        $this->requests = $values;
    }

    /**
     * @return string
     */
    public function getRawRequests()
    {
        return $this->rawRequests;
    }

    /**
     * @param $value string
     */
    public function setRawRequests($value)
    {
        $this->rawRequests = $value;
    }

    /**
     * 获取指定位置的 Request 参数
     * @param $id
     * @return mixed
     */
    public function getParameter($id)
    {
        if(!empty($this->requests[$id]))
        {
            return $this->requests[$id];
        }
        else
        {
            return '';
        }
    }

    /**
     * @param $name
     * @return null
     */
    public function __get($name)
    {
        $method = 'get'.ucfirst($name);
        if(method_exists($this,$method))
        {
            return $this->$method();
        }
        else
        {
            return null;
        }
    }
}