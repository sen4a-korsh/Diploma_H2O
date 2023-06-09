<?php


namespace App\TelegramCommands;


use Illuminate\Support\Collection;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;

class StartCommand extends Command
{
    protected string $name = 'start';

    protected string $description = 'Start command';

    public function handle()
    {

//        $this->replyWithMessage([
//           'text' => 'Здоров'
//        ]);
//
//        $this->replyWithChatAction([
//            'action' => Actions::TYPING,
//        ]);
//
//        $response = '';
//        $commands = $this->getTelegram()->getCommands();
//
//        foreach ($commands as $name => $command){
//            $response .= sprintf('/%s - %s ' . PHP_EOL, $name, $command->getDescription());
//        }
//
//        $this->replyWithMessage([
//            'text' => $response,
//        ]);

//        $telegram_user = Telegram::getWebhookUpdate()['message']['from'];
        $telegram_user = Telegram::getWebhookUpdate()->message->from;

        $this->replyWithMessage([
//           'text' => 'Вітаю'. $telegram_user['first_name'],
           'text' => 'Вітаю '. $telegram_user->first_name,
        ]);

        $this->replyWithChatAction([
            'action' => Actions::TYPING,
        ]);

        $keyboard = new Keyboard();

        $button = Keyboard::button([
            'text' => 'Зареєструватись',
            'request_contact' => true,
        ]);

        $keyboard->setResizeKeyboard(true);
        $keyboard->setOneTimeKeyboard(true);

        $keyboard->row(array($button));

        $response = $this->replyWithMessage([
            'text' => 'Для реєстрації відправте контакт',
            'reply_markup' => $keyboard,
        ]);

    }
}
