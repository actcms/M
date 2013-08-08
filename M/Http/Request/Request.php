<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Http\Request;

/**
 * Class Request
 *
 * 获取并保存请求
 *
 * @package M\Http\Request
 */

class Request extends AbstractRequest
{


    /**
     *初始化，获取并保存请求
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
     *
     */
    public function parseRequest()
    {
        $requests = explode('/',$this->rawRequests);
        $this->setRequests($requests);
    }

}