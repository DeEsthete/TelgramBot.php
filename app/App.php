<?php

use core\Telegram;
use Telegram\Bot\Api;
use Telegram\Bot\Objects\Update;

class App
{
    public function __construct()
    {
        Telegram::eachUpdate(function (Update $update) {
            $update->getMessage();
        });
    }
}