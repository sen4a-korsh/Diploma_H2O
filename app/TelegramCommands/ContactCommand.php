<?php


namespace App\TelegramCommands;


use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;


class ContactCommand extends Command
{

    protected string $name = 'contact';

    protected string $description = 'Contact command';

    public function handle()
    {

        $keyboard = new Keyboard();

        $button = Keyboard::button([
           'text' => 'Зареєструватись',
            'request_contact' => true,
//            'request_location' => true,
        ]);

        $keyboard->setResizeKeyboard(true);
        $keyboard->setOneTimeKeyboard(true);

        $keyboard->row(array($button));

        $response = $this->replyWithMessage([
            'text' => 'Для реєстрації відправте контакт',
            'reply_markup' => $keyboard,
        ]);

//        $this->replyWithMessage([
//            'text' => $response->messege->chat->id,
////            'reply_markup' => $keyboard,
//        ]);
    }
}
