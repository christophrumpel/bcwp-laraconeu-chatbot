<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{

    protected $fillable = [
        'driver',
        'chat_id',
        'first_name',
        'is_tester',
        'wants_myschedule_notifications',
    ];

    public static function storeFromBotManUser(string $driverName, $botmanUser)
    {

        Subscriber::updateOrCreate(['chat_id' => $botmanUser->getId()], [
            'driver' => $driverName,
            'chat_id' => $botmanUser->getId(),
            'first_name' => $botmanUser->getFirstName(),
        ]);
    }

    public static function deleteUserIfGiven(string $chatId)
    {
        $subscriber = Subscriber::where('chat_id', $chatId)->first();
        if ($subscriber) {
            $subscriber->delete();
        }
    }

    public static function tester()
    {
        return Subscriber::where('is_tester', 1)->get();
    }

    public function getDriverClass()
    {
        return 'BotMan\Drivers\\'.$this->driver.'\\'.$this->driver.'Driver';
    }

}
