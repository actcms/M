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
 * 根据传入模型的属性产生对应的sql语句，并返回
 *
 * Class SqlBuilder
 * @package M\Mvc\Model
 */
class SqlBuilder
{
    /**
     * 传入的模型
     * @var
     */
    private static $model;

    /**
     * 初始化
     *
     * @param Model $model
     */
    public static function init(Model $model)
    {
        self::$model = $model;
    }

    /**
     * 根据查找的id返回查询语句
     *
     * @param $id
     * @return string
     */
    public static function findByIdSqlBuild($id)
    {
        $sql = 'SELECT * FROM '.self::$model->table.' WHERE '.self::$model->key.' = '.$id;
        return $sql;
    }

    /**
     * 根据查询条件返回产讯语句
     *
     * @param $key  键名
     * @param $value 键值
     * @return string
     */
    public static function findSqlBuild($key,$value)
    {
        if(empty($value))
        {
            return self::findByIdSqlBuild($key);
        }
        else
        {
            $sql = 'SELECT * FROM '.self::$model->table.' WHERE '.$key.' = '."'".$value."'";
            return $sql;
        }
    }

    /**
     * 生成并返回查询语句
     *
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
     * 生成并返回插入语句
     *
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
     * 生成并返回更新语句
     *
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
        $sql .= ' WHERE '.self::$model->key. ' = '.self::$model->id;

        return $sql;
    }

    /**
     * 生成并返回删除语句
     *
     * @param $id
     * @return string
     */
    public static function deleteSqlBuild($id)
    {
        $sql = 'DELETE FROM '.self::$model->table.' WHERE '.self::$model->key.' = '.$id;

        return $sql;
    }

}