<?php

namespace core;

use core\commands\HelpCommands;
use models\tables\Updates;
use Telegram\Bot\Api;
use Telegram\Bot\Commands\HelpCommand;

class Telegram
{
    private static $instance;


    private function __construct()
    {
        self::$instance = new Api("926261829:AAE9WNcAGnfzlucz4pL1a-F6mYrCukTB1-M");

        self::$instance->addCommands([HelpCommands::class]);
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

    public static function sendMessage($chat_id, $message){
        return self::$instance->sendMessage([
            "chat_id" => $chat_id,
            "text" => $message
        ]);
    }

    static function eachUpdate(callable $callback){
        $update_id = Updates::max("id");
        foreach (self::getUpdates([
            "offset" => $update_id + 1
        ]) as $update){
            self::$instance->commandsHandler(false); // , ["timeout" => 30]

            Updates::insert([
                "id" => $update["update_id"]
            ]);
            if ($update->getMessage()["text"][0] != "/"){
                call_user_func($callback, $update);
            }
        }
    }
}