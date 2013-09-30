<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Log;

use M\M;

/**
 * 日志记录
 * Class Log
 * @package M\Log
 */
class Log
{
    /**
     * 日志记录类型
     * @var array
     */
    private static $type = array(
        0 => 'record',
        1 => 'error',
        4 => '404',
    );
    /**
     * 消息
     * @var
     */
    private static $message;

    /**
     * 将信息写入文件
     *
     * 只需指定记录信息，自动添加当前日期；
     * @example 日志格式，例：2013-08-23 20:57:45, message text, type;
     * @param string $message
     * @param int $type
     * @return int
     */
    public static function write($message='',$type=0)
    {
        self::$message = $message;
        $log = M::getConfig('log');
        if($log)
        {
            $message = date('Y-m-d h:i:s').','.self::$message.','.self::$type[$type].";\n";
            $file = APP.'/Log/'.self::$type[$type].'.txt';
            if(!file_exists($file))
            {
                mkdir(APP.'/log');
                touch($file);
            }
            $handle = fopen($file,'a');

            $result = fwrite($handle,$message);
            fclose($handle);
            return $result;
        }
    }

    /**
     * 错误
     * @param string $message
     */
    public static function error($message='')
    {
        $message = 'error:'.$message;
        self::write($message,1);
    }

    /**
     * 404错误
     *
     * @param string $message 404错误消息，可以是发现错误的页面位置等信息
     * @return int
     */
    public static function error_404($message='')
    {
        $message = $message.', not find';
        return self::write($message,4);
    }
}