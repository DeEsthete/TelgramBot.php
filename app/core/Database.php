<?php
namespace core;
use Medoo\Medoo;

class Database extends Medoo
{
    private static $instance;
    public function __construct()
    {
        parent::__construct([
            'database_type' => 'mysql',
            'database_name' => 'bot',
            'server' => 'localhost',
            'username' => 'root',
            'password' => ''
        ]);
    }

    static function instance(){
        if (self::$instance instanceof self){
            self::$instance = new self();
        }
        return self::$instance;
    }
}