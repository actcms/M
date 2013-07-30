<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Tool;

/**
 * Class AppCreate
 * 应用目录自动构建工具
 *
 * 可以自动生成应用所必须的基本目录和文件
 *
 * @package M\Tool
 */
class AppCreate
{
    /**
     * @var string 生成应用的路径位置，包含应用名称
     */
    private static $app;
    /**
     * @var array 应用包含的默认目录和文件
     */
    private static $appDir = array(
        'Config'        =>  'config.php',
        'Controller'    =>  'Index.php',
        'Model'         =>  null,
        'View'          =>  null,
        'Public'        =>  null,
    );

    /**
     * 创建应用指令
     *
     * @param $app
     */
    public static function create($app)
    {
        self::$app = $app;

        self::mkDir();
    }

    /**
     *生成应用文件夹和文件
     */
    private static function mkDir()
    {
        mkdir(self::$app);
        foreach(self::$appDir as $dir=>$file)
        {
            mkdir(self::$app.'/'.$dir);
            touch(self::$app.'/'.$dir.'/'.$file);
        }
        touch(self::$app.'/index.php');
    }
}

//AppCreate::create('../../Demos/Hello');