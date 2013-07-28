<?php
/**
 * User: Guowei
 * Date: 13-7-13
 * Time: 下午10:38
 */

namespace M\Mvc\Model;

/**
 * Class AbstractModel
 * @package M\Mvc\Model
 */
abstract class AbstractModel
{
    /**
     *
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     *
     */
    public function init()
    {

    }
}