<?php

namespace App\Http\Conversations;

use App\Subscriber;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class OnboardingConversation extends Conversation
{

    public function run()
    {
        $this->welcomeUser();
    }

    private function welcomeUser()
    {
        $this->say('Welcome! This is the Laracon EU chatbot.');
        $this->say('I can provide you with info about the Laracon EU conference. You can ask me about speakers, the schedule or sponsors.');
        $this->askAboutNotifications();
    }

    private function askAboutNotifications()
    {
        $question = Question::create('I am also able to send you important notifications about new speakers or schedule changes during the conference. To make that possible I need to store your chat ID and your first name. Are you fine with that? (You can change your answer at any time.)')
            ->addButtons([
                Button::create('Yes please')->value('yes'),
                Button::create('Nope')->value('no'),
            ]);

        $this->ask($question, function (Answer $answer) {

            switch ($answer->getText()) {
                case 'no':
                    Subscriber::deleteUserIfGiven($this->bot->getUser()->getId());
                    $this->say('Ok, no problem.');

                    return $this->showGeneralInfo();
                case 'yes':
                    Subscriber::storeFromBotManUser($this->bot->getDriver()->getName(), $this->bot->getUser());
                    $this->say('Perfect 👍');

                    return $this->showGeneralInfo();
                default:
                    $this->say('I am not sure what you meant. Can you try again?');

                    return $this->repeat();
            }
        });
    }

    private function showGeneralInfo()
    {
        $this->say("These are some examples sentences that you can use:\n
        - \"Show me the speakers.\"
        - \"Who is sponsoring this year?\"
        ");
    }
}
