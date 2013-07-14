<?php
/**
 * User: Guowei
 * Date: 13-7-13
 * Time: 下午10:47
 */

use M\M;
use M\Http\Request\Request;
$config = require_once 'Config/config.php';

require_once '../../M/M.php';



M::run($config);
