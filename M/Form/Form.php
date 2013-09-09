<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Form;

use M\Mvc\Model\Model;

/**
 * Class Form
 * @package M\Form
 */
class Form
{
    /**
     * @var
     */
    private static $post;

    /**
     *验证规则
     */
    public static function rule()
    {

    }

    /**
     *获取Post表单提交的数据
     */
    public static function getPost()
    {
        return self::$post = $_POST;
    }

    /**
     * 实现自动将POST数据赋值到模型对应属性
     *
     * @param \M\Mvc\Model\Model $model
     */
    public static function postToModel(Model $model)
    {
        self::getPost();

        foreach(self::$post as $key=>$value)
        {
            $model->$key = trim($value);    //去除前后空格
        }
    }


}