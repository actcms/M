<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Text;

/**
 * 字符处理
 * Class Text
 * @package M\Text
 */
class Text
{
    public static function substr($str,$start,$length,$encoding='utf8')
    {
        return mb_substr($str,$start,$length,$encoding);
    }

    public static function equal()
    {

    }
}