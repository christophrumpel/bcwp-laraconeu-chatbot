<?php

namespace App\Http\Conversations;

use App\Subscriber;
use BotMan\BotMan\Messages\Conversations\Conversation;

class BaseConversation extends Conversation
{
    public function run()
    {
    }

    protected function getSubscriberFromCurrentUser()
    {
        return Subscriber::where('chat_id', $this->bot->getUser()->getId())->first();
    }
}
