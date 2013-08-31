<?php
/**
 * 配置文件
 */

return array(

    /**
     * 应用配置项
     */
    'app'   =>   array(
        'name'  =>  'Mlog',
        'info'  => 'a simple blog!',
        'namespace' => 'Mlog',
    ),

    /**
     *url格式设置
     * 默认为查询字符串模式
     */
    'urlRules' => 'query',
    //'urlRules' => 'path',         //设置为PathInfo模式


    /**
     * 数据库配置
     */
    'db'    =>   array(
        'dsn'       =>  'mysql:host=localhost;dbname=m',
        'user'      =>  'root',
        'password'  =>  'root',

    ),

);