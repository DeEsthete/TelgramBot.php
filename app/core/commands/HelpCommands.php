<?php
namespace core\commands;


use core\Telegram;
use Telegram\Bot\Commands\Command;

class HelpCommands extends Command
{
    protected $name = "help";
    protected $description = "This is help dude";

    public function handle($arguments)
    {
        $response = '';
        $commands = $this->getTelegram()->getCommands();
        foreach ($commands as $command){
            $response .= "/" . $command->getName() . " - ";
            $response .= $command->getDescription() . PHP_EOL;
        }

        $this->replyWithMessage(["text" => $response]); //"*Бросает виртуальный спасательный круг*"
    }
}