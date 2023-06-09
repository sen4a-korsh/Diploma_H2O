<?php

namespace App\Http\Controllers;

use App\Models\TelegramBotConnectionSetting;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramBotConnectionSettingController extends Controller
{
    public function index()
    {
        return view('admin.telegram-bot-settings.index', TelegramBotConnectionSetting::getSettings());
    }

    public function store(Request $request)
    {
        TelegramBotConnectionSetting::where('key', '!=', NULL)->delete();

        foreach ($request->except('_token') as $key => $value) {
            $setting = new TelegramBotConnectionSetting();
            $setting->key = $key;
            $setting->value = $request->$key;
            $setting->save();
        }

        return redirect()->route('telegram-bot-settings.index');
    }

    public function setWebhook(Request $request)
    {
        $result = $this->sendTelegramData('setwebhook', [
            'query' => ['url' => $request->url . '/' . Telegram::getAccessToken()]
        ]);
        return redirect()->route('telegram-bot-settings.index')->with('status', $result);
    }

    public function getWebhookInfo(Request $request)
    {
        $result = $this->sendTelegramData('getWebhookInfo');

        return redirect()->route('telegram-bot-settings.index')->with('status', $result);
    }

    public function sendTelegramData($route = '', $params = [], $method = 'POST')
    {
        $client = new Client(['verify' => false,'base_uri' => 'https://api.telegram.org/bot' . Telegram::getAccessToken() . '/']);
        $result = $client->request($method, $route, $params);
        return (string) $result->getBody();
    }

    public function testGetInfo()
    {
        dd(Telegram::bot('H2O_bot')->getMe());



    }
}
