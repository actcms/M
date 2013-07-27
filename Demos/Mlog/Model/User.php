<?php
/**
 * User: Guowei
 * Date: 13-7-27
 * Time: 下午4:17
 */

namespace Mlog\Model;


use M\Mvc\Model\Model;

class User extends Model
{
    private $id;
    private $username;
    private $password;
    private $email;

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getEmail()
    {
        $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
}