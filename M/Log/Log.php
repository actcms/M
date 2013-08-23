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