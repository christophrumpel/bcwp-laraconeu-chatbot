<?php

namespace Tests\BotMan;

use Tests\TestCase;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class OnboardingConversationTest extends TestCase
{

    use DatabaseMigrations;

    public function test_it_starts_onboarding_for_different_keywords()
    {
        $this->bot->receives('/start')
            ->assertReply('Welcome! This is the Laracon EU chatbot.');

        $this->bot->receives('GET_STARTED')
            ->assertReply('Welcome! This is the Laracon EU chatbot.');
    }

    public function test_it_starts_onboarding_with_subscription()
    {
        $this->bot->receives('/start')
            ->assertReply('Welcome! This is the Laracon EU chatbot.')
            ->assertReply('I can provide you with info about the Laracon EU conference. You can ask me about speakers, the schedule or sponsors.')
            ->assertTemplate($this->getSubscriptionQuestion(), true)
            ->receives('yes')
            ->assertReply('Perfect 👍')
            ->assertReply("These are some examples sentences that you can use:\n
        - \"Show me the speakers.\"
        - \"Who is sponsoring this year?\"
        ");
    }

    public function test_it_starts_onboarding_without_subscription()
    {
        $this->bot->receives('/start')
            ->assertReply('Welcome! This is the Laracon EU chatbot.')
            ->assertReply('I can provide you with info about the Laracon EU conference. You can ask me about speakers, the schedule or sponsors.')
            ->assertTemplate($this->getSubscriptionQuestion(), true)
            ->receives('no')
            ->assertReply('Ok, no problem.')
            ->assertReply("These are some examples sentences that you can use:\n
        - \"Show me the speakers.\"
        - \"Who is sponsoring this year?\"
        ");
    }

    private function getSubscriptionQuestion()
    {
        return Question::create('I am also able to send you important notifications about new speakers or schedule changes during the conference. To make that possible I need to store your chat ID and your first name. Are you fine with that? (You can change your answer at any time.)')
            ->addButtons([
                Button::create('Yes please')->value('yes'),
                Button::create('Nope')->value('no'),
            ]);
    }
}
