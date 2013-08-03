<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Form;

/**
 * Class AbstractForm
 * @package M\Form
 */
Abstract class AbstractForm
{


    public function __construct()
    {

    }

    /**
     *
     */
    public function init()
    {

    }





    /**
     *获取Post表单
     */
    public function getPost()
    {
        return $this->post = $_POST;
    }

    /**
     *必须填写的项
     */
    public static function required()
    {

    }

    /**
     *
     */
    public static function email()
    {

    }

    public function password()
    {

    }

    public static function equal()
    {

    }

    abstract function rule();



}