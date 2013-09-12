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
     * @var
     */
    protected $id;
    /**
     * @var
     */
    protected $username;
    /**
     * @var
     */
    protected $password;
    /**
     * @var
     */
    protected $email;
    /**
     * @var string
     */
    protected $table = 'user';
    /**
     * @var string
     */
    protected $primary_key = 'id';
    /**
     * @var array
     */
    protected $data = array(
        'id' => 'id',
        'username' => 'username',
        'password' => 'password',
        'email' => 'email',
    );

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return bool
     */
    public function login()
    {
        $user = $this->find('username',$this->username);
        if($user)
        {
            if($user['password']==$this->password)
            {
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
}