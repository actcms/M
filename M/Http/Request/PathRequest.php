<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Http\Request;

/**
 * 获取并保存请求
 *
 * PATHINFO模式的请求，形如：www.example.com/Post/index/id
 *
 * Class PathRequest
 * @package M\Http\Request
 */
class PathRequest extends AbstractRequest
{
    /**
     * 初始化，获取并保存原始请求
     *
     * @return mixed|void
     */
    public function init()
    {
        if(!empty($_SERVER['PATH_INFO']))
        {
            $this->setRawRequests($_SERVER['PATH_INFO']);
        }
        else
        {
            $this->setRawRequests('');
        }
    }

    /**
     * 提取请求
     * @return mixed|void
     */
    public function parseRequest()
    {
        $requests = ltrim($this->rawRequests,'/');
        $requests = explode('/',$requests);
        $this->setRequests($requests);
    }
}