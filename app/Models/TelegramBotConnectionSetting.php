<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramBotConnectionSetting extends Model
{
    use HasFactory;

    public static function getSettings($key = null)
    {
        $settings = $key ? TelegramBotConnectionSetting::where('key', $key)->first() : TelegramBotConnectionSetting::get();

        $collectSettings = collect();

        foreach($settings as $setting){
            $collectSettings->put($setting->key, $setting->value);
        }

        return $collectSettings;
    }
}
