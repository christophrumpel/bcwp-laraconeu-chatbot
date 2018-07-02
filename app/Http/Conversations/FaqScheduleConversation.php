<?php

namespace App\Http\Conversations;

use App\Talk;
use BotMan\BotMan\Messages\Conversations\Conversation;

class FaqScheduleConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->say(Talk::asScheduleTextMessage());
    }
}
