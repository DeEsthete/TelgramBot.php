<?php

use core\commands\HelpCommands;
use Core\Helpers;

return [
    "token" => "926261829:AAE9WNcAGnfzlucz4pL1a-F6mYrCukTB1-M",
    "commands" => [
        HelpCommands::class
    ],
    "update_id_file" => Helpers::path("data", "update_id.txt"),
    "keyboard" => [
        ["one", "two", "three"],
        ["one", "two"],
        ["one"]
    ]
];