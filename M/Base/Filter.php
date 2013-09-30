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
     * @param bool $all 默认为false ，如果设置为true则字符串必须完全匹配
     * @return bool
     */
    public static function word($values,$all=false)
    {
        if($all)
        {
            $pattern = '/^[a-zA-Z0-9\x{4e00}-\x{9fa5}]{1,10}$/u';         //匹配字母数字与汉字,必须以字母数字开头和结束
        }
        else
        {
            $pattern = '/[a-zA-Z0-9\x{4e00}-\x{9fa5}]{1,10}/u';         //匹配字母数字与汉字
        }

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
            return $email;
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
        if(is_numeric($number))
        {
            return $number;
        }
        else
        {
            return false;
        }
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

    /**
     * 字符串长度验证
     * @param $value
     * @param $min
     * @param int $max
     * @return bool
     */
    public static function length($value,$min,$max=256)
    {
        $length = mb_strlen($value);
        if($length < $min || $length > $max)
        {
            return false;
        }
        else
        {
            return $value;
        }
    }
}