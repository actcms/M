<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Base;

/**
 * Class Filter
 * @package M\Base
 */
class Filter
{
    /**
     * 过滤掉字母数字与汉字之外的内容
     * 近获取匹配到的第一部分，匹配成功返回过滤后得到的字符串，否则返回false
     *
     * @param $values
     * @return bool
     */
    public static function word($values)
    {
        $pattern = '/[a-zA-Z0-9\x{4e00}-\x{9fa5}]{1,10}/u';         //匹配字母数字与汉字
        $result = preg_match($pattern,$values,$matches);

        if($result)
        {
            return $matches[0];
        }
        else
        {
            return false;
        }
    }

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