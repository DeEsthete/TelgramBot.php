<?php

use Core\Config;
use core\Telegram;
use models\UpdatesHandler;
use Telegram\Bot\Api;
use Telegram\Bot\Objects\Update;

class App
{
    public function __construct()
    {
        $cfg = Config::telegram();

        $api = new Api($cfg["token"]);
        $api->addCommands($cfg["commands"]);
        $updates = $api->commandsHandler(false);

        new UpdatesHandler($api, $updates);

//        Telegram::init(Config::telegram());
//
//        Telegram::handle(function (Update $update) {
//            $chat_id = $update->getMessage()["chat"]["id"];
//            $text = $update->getMessage()["text"];
//            var_dump($chat_id);
//            Telegram::sendMessage($chat_id, $text);
//        });
    }
}