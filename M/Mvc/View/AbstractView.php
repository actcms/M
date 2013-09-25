<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Mvc\View;

use M\Base\Text;

/**
 * Class AbstractView
 * @package M\Mvc\View
 */
abstract class AbstractView
{
    /**
     * 输出方法
     * @param $value
     */
    public function write($value)
    {
        Text::write($value);
    }

    /**
     * write 的别名
     *
     * @param $value
     */
    public function w($value)
    {
        $this->write($value);
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
    public function substr($str,$start,$length,$encoding='utf8')
    {
        return Text::substr($str,$start,$length,$encoding='utf8');
    }
}