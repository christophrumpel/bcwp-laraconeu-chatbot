<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;

class FaqJourneyConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->say("Via Plane: ✈️ \nSchiphol Amsterdam airport is Europe's fourth-busiest airport and the world's 2nd largest hub airport, handling about 50 million passengers and 1.5 million tons of freight per year. It is often ranked among the world's best airports by the Skytrax passenger survey.");

        $this->say("Via train: 🚄 \n
➡️ Brussels - Amsterdam by train, from €29\n
➡️ Paris - Amsterdam by train, from €35\n
➡️ Frankfurt - Amsterdam by train from €39\n
➡️ Berlin - Amsterdam by train, from €39\n
➡️ London - Amsterdam by train, from €59");
    }
}
