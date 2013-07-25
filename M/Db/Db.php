<?php
/**
 * User: Guowei
 * Date: 13-7-17
 * Time: 下午2:31
 */
namespace M\Db;


class Db
{
    private $host;
    private $user;
    private $pwd;
    private $database;

    public function __construct($host,$user,$pwd,$database)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pwd = $pwd;
        $this->database = $database;
    }

    public function add()
    {

    }

    public function del()
    {

    }

    public function update()
    {

    }

    public function select()
    {

    }



}