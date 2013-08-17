<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */
namespace Mlog\Model;

use M\Mvc\Model\Model;

class User extends Model
{
    protected $id;
    protected $username;
    protected $password;
    protected $email;

    protected $table = 'user';
    protected $key = 'id';

    protected $data = array(
        'id' => 'id',
        'username' => 'username',
        'password' => 'password',
        'email' => 'email',
    );

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

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