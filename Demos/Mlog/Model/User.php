<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace Mlog\Model;

use M\Base\Filter;
use M\Mvc\Model\Model;

/**
 * Class User
 * @package Mlog\Model
 */
class User extends Model
{
    /**
     * 用户id
     * @var
     */
    protected $uid;
    /**
     * 用户名
     * @var
     */
    protected $username;
    /**
     * 密码
     * @var
     */
    protected $password;
    /**
     * 邮箱
     * @var
     */
    protected $email;
    /**
     *
     * @var string
     */
    protected $table = 'user';
    /**
     * @var string
     */
    protected $primary_key = 'u_id';
    /**
     * 数据库字段与模型属性之间的映射关系
     *
     * $db=>$model
     *
     * @var array
     */
    protected $data = array(
        'u_id' => 'uid',
        'username' => 'username',
        'password' => 'password',
        'email' => 'email',
    );

    /**
     * @param $uid
     * @return $this
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }

    /**
     * @param $username
     * @return $this
     */
    public function setUsername($username)
    {
        if(Filter::length($username,4) && Filter::word($username,true))
        {
            $this->username = $username;
        }
        else
        {
            return false;
        }
    }

    /**
     * 密码设置
     * 采用md5加密
     * @param $password
     * @return $this
     */
    public function setPassword($password)
    {
        if(Filter::length($password,6) && Filter::word($password,true))
        {
            $this->password = md5($password);
        }
        else
        {
            return false;
        }
    }

    /**
     * @param $email
     * @return $this
     */
    public function setEmail($email)
    {
        $email = Filter::email($email);
        if($email)
        {
            $this->email = $email;
        }
        else
        {
            return false;
        }
    }

    /**
     * 用户登录处理
     *
     * @return bool
     */
    public function login()
    {
        $user = $this->find('username',$this->username);
        if($user)
        {
            if($user['password'] == $this->password)
            {
                $_SESSION['user'] = $user;
                return array(true,'登录成功');
            }
            else
            {
                return array(false,'用户名或密码错误');
            }
        }
        else
        {
            return array(false,'用户名不存在');
        }
    }

    /**
     * 检测用户名是否已经注册
     *
     * @param string $username
     * @return bool
     */
    public function isUserNameExist($username = '')
    {
        if(empty($username))
        {
            $user = $this->find('username',$this->username);
        }
        else
        {
            $user = $this->find('username',$username);
        }

        if($user)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}