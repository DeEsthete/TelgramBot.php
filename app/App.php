<?php

use core\Telegram;
use Telegram\Bot\Api;
use Telegram\Bot\Objects\Update;

class App
{
    public function __construct()
    {
        Telegram::eachUpdate(function (Update $update) {
            $chat_id = $update->getMessage()["chat"]["id"];
            $text = $update->getMessage()["text"];
            var_dump($chat_id);
            Telegram::sendMessage($chat_id, $text);

            //TODO: SEND MESSAGES
            //var_dump($update->getMessage()["text"]);

        });
    }
}