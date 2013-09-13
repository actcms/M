<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Log;

/**
 * 日志记录
 * Class Log
 * @package M\Log
 */
class Log
{
    /**
     * 将信息写入文件
     *
     * 只需指定记录信息，自动添加当前日期；
     * @example 日志格式，例：2013-08-23 20:57:45,message text;
     * @param $message
     * @return int
     */
    public static function write($message)
    {
        $message = date('Y-m-d h:i:s').','.$message.';';
        $file = APP.'/Log/log.txt';
        $handle = fopen($file,'a');

        $result = fwrite($handle,$message);
        fclose($handle);
        return $result;
    }
}