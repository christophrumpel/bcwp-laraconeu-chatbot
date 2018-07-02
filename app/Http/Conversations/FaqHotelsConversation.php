<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;

class FaqHotelsConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->say('Any hotel close to Amsterdam Central Station would be suitable. In the coming days, there will be several hotel partner deals announced.');
    }
}
