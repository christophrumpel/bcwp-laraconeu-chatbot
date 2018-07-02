<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;

class FaqWhoIsItForConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->say('Are you a developer who has a passion for building web-applications? Do you love Laravel or are just in the processing of getting started? Do you want to meet the community members that help make it all happen? Then this is the place to be. Laracon EU is the single largest gathering of Laravel developers and enthusiasts in Europe. It\'s a great opportunity to meet and learn from a diverse group of people that work in your space.');
    }
}
