<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
use M\M;

$config = require_once 'Config/config.php';

define('M','../../M');
define('APP','../HelloWorld');

require_once M.'/M.php';

M::run($config);

