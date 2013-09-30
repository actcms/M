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

    /**
     * 关键字屏蔽
     *
     * 只是在输出时将关键字替换，并不会影响数据库存储的内容，
     * 要使用关键字屏蔽必须在视图内容输出时用View::w()替代echo语句
     */
    'filter' => array(
        'string' => array(
            //'王小波' => '×小波',
            //'胡适' => '胡××',
        ),
    ),
);