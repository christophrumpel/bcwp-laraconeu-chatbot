<?php

namespace App\Http\Middleware;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Interfaces\Middleware\Sending;

class AddTypingMiddleware implements Sending
{

    public function sending($payload, $next, BotMan $bot)
    {
        $bot->typesAndWaits(.5);

        return $next($payload);
    }
}
