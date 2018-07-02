<?php

namespace App\Http\Conversations;

use App\Speaker;
use BotMan\BotMan\Messages\Conversations\Conversation;

class FaqSpeakersConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->say("These are the confirmed speakers: \n".Speaker::asTextMessage());
    }
}
