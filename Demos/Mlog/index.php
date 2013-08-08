<?php
/**
 * User: Guowei
 * Date: 13-7-25
 * Time: 上午11:49
 */

use M\M;

$configs = require_once 'Config/config.php';


require_once '../../M/M.php';

M::run($configs);

echo \M\App::getHello();

