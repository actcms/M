<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Http\Request;

/**
 * 处理PATHINFO模式的请求
 * Class PathRequest
 * @package M\Http\Request
 */
class PathRequest extends AbstractRequest
{
    /**
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
     * @return mixed|void
     */
    public function parseRequest()
    {
        $requests = ltrim($this->rawRequests,'/');
        $requests = explode('/',$requests);
        $this->setRequests($requests);
    }
}