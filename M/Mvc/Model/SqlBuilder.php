<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Mvc\Model;

/**
 * sql合成器
 *
 *
 * Class SqlBuilder
 * @package M\Mvc\Model
 */
class SqlBuilder
{
    /**
     * @var
     */
    public static $model;

    /**
     * @param $model
     */
    public static function init($model)
    {
        self::$model = $model;
    }

    /**
     * @return string
     */
    public static function selectSqlBuild()
    {
        $sql = "SELECT * FROM ".self::$model->table;
        $sql .= self::$model->where;
        $sql .= self::$model->orderBy;
        $sql .= self::$model->limit;

        return $sql;
    }

    /**
     * @return string
     */
    public static function addSqlBuild()
    {
        $sql = 'INSERT INTO '. self::$model->table .'(';
        foreach (self::$model->data as $key=>$value)
        {
            if(self::$model->$value != '')
            {
                $sql .= "`$key`,";
            }
        }

        $sql = rtrim($sql,',');		//去掉产生的sql语句末尾逗号

        $sql .= ') VALUES (';
        foreach (self::$model->data as $key=>$value)
        {
            if(self::$model->$value != '')
            {
                $sql .= "'".self::$model->$value."'".',';
            }
        }

        $sql = rtrim($sql,',');		//去除末尾逗号
        $sql .= ')';

        return $sql;
    }

    /**
     * @return string
     */
    public static function updateSqlBuild()
    {
        $sql = 'UPDATE '. self::$model->table.' SET ';
        foreach(self::$model->data as $key=>$value)
        {
            if(self::$model->$value != '')
            {
                $sql .= $key. ' = '."'".self::$model->$value."'".',';
            }
        }

        $sql = rtrim($sql,',');
        echo $sql .= ' WHERE '.self::$model->key. ' = '.self::$model->id;

        return $sql;
    }

    /**
     * @param $id
     * @return string
     */
    public static function deleteSqlBuild($id)
    {
        $sql = 'DELETE FROM '.self::$model->table.' WHERE '.self::$model->key.' = '.$id;

        return $sql;
    }
}