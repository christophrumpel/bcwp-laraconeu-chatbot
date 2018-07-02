<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;

class FaqDateConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->say('The main conference takes place on August 30 & 31th in the Kromhouthal.');
        $this->say('The pre-conference workshops take place on August 29th (location TBA). The pre-conference workshops require separate tickets.');
    }
}
