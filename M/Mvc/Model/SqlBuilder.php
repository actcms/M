<?php
/**
 * @link https://github.com/MaGuowei
 * @copyright 2013 maguowei.com
 * @author Ma Guowei <imaguowei@gmail.com>
 */

namespace M\Mvc\Model;

/**
 * Class SqlBuilder
 * @package M\Mvc\Model
 */
class SqlBuilder extends Model
{
    /**
     * @param Model $model
     * @return string
     */
    public static function selectSqlBuild(Model $model)
    {
        $sql = "SELECT * FROM $model->table";
        $sql .= $model->where;
        $sql .= $model->orderBy;
        $sql .= $model->limit;

        return $sql;
    }

    /**
     * @param Model $model
     * @return string
     */
    public static function addSqlBuild(Model $model)
    {
        $sql ="INSERT INTO `$model->table` (";
        foreach ($model->data as $key=>$value)
        {
            if(!empty($model->$value))
            {
                $sql .= "`$key`,";
            }
        }

        $sql = rtrim($sql,',');		//去掉产生的sql语句末尾逗号

        $sql .= ") VALUES (";
        foreach ($model->data as $key=>$value)
        {
            if(!empty($model->$value))
            {
                $sql .= "'".$model->$value."'".',';
            }
        }

        $sql = rtrim($sql,',');		//去除末尾逗号

        $sql .= ")";

        return $sql;
    }
}