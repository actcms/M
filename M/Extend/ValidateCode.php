<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Extend;

/**
 * 验证码创建工具
 *
 * 验证码的生成需要开启GD库；
 *
 * 验证码生成的过程中会自动将其以字符串的形式注册到会话，可以用$_SESSION['validateCode']获取
 *
 * Class ValidateCode
 * @package M\Extend
 * @version 0.1
 */
class ValidateCode
{
    /**
     * @var 验证码
     */
    private $validateCode;
    /**
     * @var 图像
     */
    private $image;
    /**
     * @var int 图像宽度
     */
    private $width;
    /**
     * @var int 图像高度
     */
    private $height;
    /**
     * @var int 验证字符数目
     */
    private $codeNumber;

    /**
     * 构造器
     *
     * 验证码参数初始化
     *
     * @param int $codeNumber 验证码字符数目
     * @param int $width 宽度
     * @param int $height 高度
     */
    public function __construct($codeNumber=4,$width=80,$height=30)
    {
        $this->width = $width;
        $this->height = $height;
        $this->codeNumber = $codeNumber;
    }

    /**
     * 显示验证码图像
     */
    public function showCodeImage()
    {
        $this->createCodeImage();
        $this->setValidateCode();
        $this->addDisturbElement();
        header('Content-Type: image/png');
        imagepng($this->image);
        imagedestroy($this->image);
    }

    /**
     * 获取生成的验证码字符串
     * @return mixed
     */
    public function getValidateCode()
    {
        return $this->validateCode;
    }

    /**
     * 生成图像
     */
    private function createCodeImage()
    {
        $this->image = imagecreatetruecolor($this->width,$this->height);
        imagecolorallocate($this->image, 0, 0, 0);      //设置图像背景为黑色
    }

    /**
     * 设置验证码字符
     */
    private  function setValidateCode()
    {
        $this->createValidateCode();
        for($i = 0; $i<$this->codeNumber;$i++)
        {
            $size = rand(floor($this->height / 5), floor($this->height / 3));
            $x = floor($this->width / $this->codeNumber) * $i + 5;
            $y = rand(0, $this->height - 20);
            $color = imagecolorallocate($this->image, rand(50, 250), rand(100, 250), rand(128, 250));
            imagechar($this->image, $size, $x, $y, $this->validateCode[$i], $color);
        }
    }

    /**
     * 生成验证码字符串
     */
    private function createValidateCode()
    {
        $string = '23456789abcdefghgkmnpqrstuvwxyzABCDEFGHGKMNPQRSTUVWXYZ';

        for($i = 0; $i < $this->codeNumber; $i++)
        {
            $this->validateCode .= $string[rand(0,strlen($string)-1)];
        }

        //将验证码注册到会话
        session_start();
        $_SESSION['validateCode'] = $this->validateCode;
    }

    /**
     * 添加干扰元素
     */
    private function addDisturbElement()
    {
        $area = ($this->width * $this->height) / 20;
        $disturbNum = ($area > 250) ? 250 : $area;

        //添加点干扰
        for ($i = 0; $i < $disturbNum; $i++)
        {
            $color = imagecolorallocate($this->image, rand(0, 255), rand(0, 255), rand(0, 255));
            imagesetpixel($this->image, rand(1, $this->width - 2), rand(1, $this->height - 2), $color);
        }

        //添加弧线干扰
        for ($i = 0; $i <= 5; $i++)
        {
            $color = imagecolorallocate($this->image, rand(128, 255), rand(125, 255), rand(100, 255));
            imagearc($this->image, rand(0, $this->width), rand(0, $this->height), rand(30, 300), rand(20, 200), 50, 30, $color);
        }
    }
}

//$va = new \M\Extend\ValidateCode(5,80,30);
//
//echo $va->showCodeImage();
