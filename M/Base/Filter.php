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
            return $matches;
        }
        else
        {
            return false;
        }
    }
}