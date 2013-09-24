<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Base;

/**
 * 字符处理
 * Class Text
 * @package M\Text
 */
class Text
{
    /**
     * 字符输出
     *
     * @param $value
     * @param bool $print
     * @return string
     */
    public static function write($value,$print = true)
    {
        if($print)
        {
            echo $value;
        }
        else
        {
            return $value;
        }

    }

    /**
     * 字符串截取
     *
     * @param $str
     * @param $start
     * @param $length
     * @param string $encoding
     * @return string
     */
    public static function substr($str,$start,$length,$encoding='utf8')
    {
        return mb_substr($str,$start,$length,$encoding);
    }

    public static function equal()
    {

    }
}