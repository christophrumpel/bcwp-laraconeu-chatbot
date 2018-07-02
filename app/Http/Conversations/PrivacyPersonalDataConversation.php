<?php

namespace App\Http\Conversations;

class PrivacyPersonalDataConversation extends BaseConversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->showPersonalData();
    }

    private function showPersonalData()
    {
        if ($subscriber = $this->getSubscriberFromCurrentUser()) {
            $this->say("You are subscribed to notifications. As a result we have stored your name {$subscriber->first_name} and your chat id: {$subscriber->chat_id}");
        } else {
            $this->say('We haven\'t stored any personal data of yours, because you are currently not subscribed to notifications. If you subscribe, we will store only your name and chat ID.');
        }
    }
}
