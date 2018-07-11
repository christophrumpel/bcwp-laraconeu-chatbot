<?php

namespace App\Http\Conversations;

use App\Subscriber;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;

class PrivacySubscriptionConversation extends BaseConversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->informAboutGivenSubscription();
    }

    private function informAboutGivenSubscription()
    {
        if ($this->getSubscriberFromCurrentUser()) {
            $this->say('You are subscribed to notifications.');
            $this->askAboutSubscription('Do you want to stay subscribed?');
        } else {
            $this->say('You are currently not subscribed to notifications.');
            $this->askAboutSubscription('Do you want to get notifications about latest Laracon EU news?');
        }
    }

    private function askAboutSubscription(string $replyText)
    {
        $question = Question::create($replyText)->addButtons([
            Button::create('Yes please')->value('yes'),
            Button::create('No')->value('no'),
        ]);

        $this->ask($question, function (Answer $answer) {
            switch ($answer->getText()) {
                case 'no':
                    Subscriber::deleteUserIfGiven($this->bot->getUser()->getId());

                    return $this->say('Ok, no problem. Maybe later.');
                case 'yes':
                    Subscriber::storeFromBotManUser($this->bot->getDriver()->getName(), $this->bot->getUser());

                    return $this->say('Awesome! We will keep you updated with the latest news about Laracon EU.');
                default:
                    $this->say('I am not sure what you meant. Can you try again?');

                    return $this->repeat();
            }
        });
    }
}
