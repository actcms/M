<?php
/**
 * User: Guowei
 * Date: 13-7-13
 * Time: 下午10:54
 */

return array(

    'app'   =>   array(
        'name'  =>  'Hello World',
        'basePath' => 'HelloWorld',
    ),

    /**
     *url格式设置
     * 默认为查询字符串模式
     */
    'urlRules' => 'query',
    //'urlRules' => 'path',         //设置为PathInfo模式

    'db'    =>   array(
        'host'      =>  'localhost',
        'user'      =>  'root',
        'pwd'       =>  'root',
        'database'  =>  'm',
    ),


);