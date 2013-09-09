<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Form;


class ValidateForm
{
    /**
     * email 格式验证
     * @param $email
     * @return bool
     */
    public static function email($email)
    {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if($email)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * 验证是否为数字或者字符串数字
     * @param $number
     * @return bool
     */
    public static function number($number)
    {
        return is_numeric($number);
    }

    /**
     * 验证两个值是否相等
     *
     * @param $var1
     * @param $var2
     * @return bool
     */
    public static function equal($var1,$var2)
    {
        if($var1==$var2)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function length($length)
    {

    }

    public static function max($max)
    {

    }

    public static function min($min)
    {

    }

    public static function notNull()
    {

    }

}