<?php

namespace models;


use Core\Config;
use Telegram\Bot\Api;
use Telegram\Bot\Objects\Update;

class UpdatesHandler
{
    private $telegram;

    public function __construct(Api $telegram, $updates)
    {
        $this->telegram = $telegram;
        $this->handleAll($updates);
    }

    private function handleAll($updates)
    {
        foreach ($updates as $update) {
            $this->handleOne($update);
        }
    }

    private function handleOne(Update $update)
    {
        $markup = $this->telegram->replyKeyboardMarkup([
            "keyboard" => Config::telegram("keyboard"),
            "resize_keyboard" => true
        ]);

        $this->telegram->sendMessage([
            "chat_id" => $update->getMessage()->getChat()->getId(),
            "text" => $update->getMessage()->getText(),
            "reply_markup" => $markup
        ]);
    }
}