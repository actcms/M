<?php
/**
 * @link https://github.com/MaGuowei/M
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Form;

/**
 * Class AbstractForm
 * @package M\Form
 */
Abstract class AbstractForm
{
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $email;

    /**
     * 构造器
     */
    public function __construct()
    {

    }

    /**
     *
     */
    public function required()
    {

    }

    public function email()
    {

    }

    public function password()
    {

    }

    abstract function rule();



}