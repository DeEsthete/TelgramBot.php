<?php

namespace core;

use Telegram\Bot\Api;

class Telegram
{
    private static $instance;


    private function __construct()
    {
        self::$instance = new Api("926261829:AAE9WNcAGnfzlucz4pL1a-F6mYrCukTB1-M");
    }

    private static function init()
    {
        if (!self::$instance instanceof Api) {
            new self();
        }
    }

    static function getUpdates(array $params = [], $shouldEmitEvents = true)
    {
        self::init();

        return self::$instance->getUpdates($params, $shouldEmitEvents);
    }

    static function eachUpdate(callable $callback){
        foreach (self::getUpdates() as $update){
            call_user_func($callback, $update);
        }
    }
}