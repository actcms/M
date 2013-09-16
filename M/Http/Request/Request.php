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
 * 查询字符串形式，形如www.example.com?Post/index/id
 *
 * Class Request
 * @package M\Http\Request
 */

class Request extends AbstractRequest
{


    /**
     *初始化，获取并保存原始请求
     */
    public function init()
    {

        if(!empty($_SERVER['QUERY_STRING']))
        {
            $this->setRawRequests($_SERVER['QUERY_STRING']);
        }
        else
        {
            $this->setRawRequests('');
        }
    }

    /**
     *提取请求
     */
    public function parseRequest()
    {
        $requests = explode('/',$this->rawRequests);
        $this->setRequests($requests);
    }
}