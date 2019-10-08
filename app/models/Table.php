<?php
namespace models;


use core\Database;

abstract class Table
{
     protected static $table_name;

     static function select($join = "*", $columns = null, $where = null){
         return Database::instance()->select(static::$table_name, $join, $columns, $where);
     }

     static function get($join = null, $columns = null, $where = null){
         return Database::instance()->get(static::$table_name, $join, $columns, $where);
     }

     static function has($join, $where = null){
         return Database::instance()->has(static::$table_name, $join, $where);
     }

     static function insert($data){
         return Database::instance()->insert(static::$table_name, $data);
     }

    static function update($data, $where = null){
        return Database::instance()->update($data, $where);
    }

     static function delete($where){
         return Database::instance()->delete(static::$table_name, $where);
     }

     static function count($where = null){
         return Database::instance()->count(static::$table_name, $where);
     }

     static function getById($id){
         return self::get([
             "id" => $id
         ]);
     }
}