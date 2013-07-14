<?php
/**
 * User: Guowei
 * Date: 13-7-14
 * Time: 上午9:34
 */

namespace MTest\Http\Request;

use M\Http\Request\Request;

require_once '../../../../M/Http/Request/AbstractRequest.php';
require_once '../../../../M/Http/Request/Request.php';

class RequestTest
{

}

Request::init();
print_r(Request::parseRequest());

