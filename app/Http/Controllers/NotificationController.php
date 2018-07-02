<?php

namespace App\Http\Controllers;

use App\Subscriber;
use BotMan\Drivers\Telegram\TelegramDriver;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

class NotificationController extends Controller
{
    public function send()
    {
        $botman = app('botman');
        $messageText = \request()->get('message');
        $message = OutgoingMessage::create($messageText);
        $receivers = \request()->get('receivers');

        $receivers = $receivers === 'all' ? Subscriber::all() : Subscriber::where('chat_id', $receivers)->get();

        $receivers->each(function ($receiver) use ($botman, $message) {
            $botman->say($message, $receiver->chat_id, $receiver->getDriverClass());
        });

        return redirect()->back();
    }
}
