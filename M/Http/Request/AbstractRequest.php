<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Http\Request;

/**
 * Class AbstractRequest
 * @package M\Http\Request
 */

abstract class AbstractRequest
{
    /**
     * 原始请求
     * @var
     */
    private $rawRequests;
    /**
     * @var string 保存处理后的请求
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
     * @return static
     */
    public static function getRequest()
    {
        return new static();
    }
    /**
     * @return string
     */
    public function getRequests()
    {
        return $this->requests;
    }
    /**
     * @param $value
     */
    public function setRequests($value)
    {
        $this->requests = $value;
    }

    /**
     * @return mixed
     */
    public function getRawRequests()
    {
        return $this->rawRequests;
    }

    /**
     * @param $value
     */
    public function setRawRequests($value)
    {
        $this->rawRequests = $value;
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