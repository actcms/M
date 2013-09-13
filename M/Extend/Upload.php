<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Extend;

/**
 * 文件上传
 *
 * Class Upload
 * @package M\Extend
 */
class Upload
{
    /**
     * @var
     */
    private $file;
    /**
     * @var
     */
    private $uploadDir;

    /**
     * @param $file
     */
    public function __construct($file)
    {
        $this->file = $_FILES[$file];
    }

    /**
     * 开始上传
     * @return bool
     */
    public function up()
    {
        if(move_uploaded_file($this->file['tmp_name'],$this->uploadDir.$this->file['name']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * 设置存储目录
     * @param $dir
     * @return $this
     */
    public function setUploadDir($dir)
    {
        $this->uploadDir = $dir;
        return $this;
    }

    /**
     * 设置文件名
     * @param string $filename
     * @return $this
     */
    public function setFilename($filename = '')
    {
        if(!empty($filename))
        {
            $this->file['name'] = $filename;
        }

        return $this;
    }
}
