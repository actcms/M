<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
use M\M;

$config = require_once 'Config/config.php';

define('M','E:/www/M');
define('App',M.'/Demos');

require_once '../../M/M.php';

M::run($config);

