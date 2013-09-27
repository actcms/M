<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
use M\M;

//定义框架路径
define('M','../../M');

//定义应用路径
define('APP','../Mlog');

//引入配置
$configs = require_once APP.'/Config/config.php';

require_once M.'/M.php';

header('Content-type:text/html;charset=utf-8');

M::run($configs);
