<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace Mlog\Model;

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
        return $this;
    }

    /**
     * @param $username
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @param $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @param $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
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
            if($user['password']==$this->password)
            {
                $_SESSION['id'] = $user['u_id'];
                $_SESSION['username'] = $user['username'];

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
     * @return bool
     */
    public function isUserNameExist()
    {
        $user = $this->find('username',$this->username);
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