<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace M\Tool;

/**
 * Class AppCreate
 * @package M\Tool
 */
class AppCreate
{
    /**
     * @var
     */
    private static $app;
    /**
     * @var array
     */
    private static $appDir = array(
        'Config'        =>  'config.php',
        'Controller'    =>  'Index.php',
        'Model'         =>  null,
        'View'          =>  null,
        'Public'        =>  null,
    );

    /**
     * @param $app
     */
    public static function create($app)
    {
        self::$app = $app;

        self::mkDir();
    }

    /**
     *
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