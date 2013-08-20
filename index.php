<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
use M\M;

define('M','e:/www/M/M');
define('APP','e:/www/M/Demos/Mlog');

$configs = require_once APP.'/Config/config.php';
$configs['app']['basePath'] = '/Demos/Mlog';
require_once M.'/M.php';

header('Content-type:text/html;charset=utf-8');

M::run($configs);