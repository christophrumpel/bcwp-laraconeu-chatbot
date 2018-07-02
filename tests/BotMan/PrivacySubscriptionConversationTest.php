<?php

namespace Tests\BotMan;

use Tests\TestCase;
use App\Subscriber;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PrivacySubscriptionConversationTest extends TestCase
{
    use DatabaseMigrations;

    public function test_user_not_subscribed_and_still_not_interested()
    {
        $this->bot->receives('privacy.subscription')
            ->assertReply('You are currently not subscribed to notifications.')
            ->assertTemplate($this->getSubscriptionQuestionTemplate('Do you want to get notifications about latest Laracon EU news?'), true)
            ->receives('no')
            ->assertReply('Ok, no problem. Maybe later.');
    }

    public function test_user_is_subscribed_wants_to_unsubscribe()
    {
        Subscriber::create(['chat_id' => '123', 'driver' => 'Telegram', 'first_name' => 'John']);

        $this->bot->setUser(['id' => '123'])
        ->receives('privacy.subscription')
            ->assertReply('You are subscribed to notifications.')
            ->assertTemplate($this->getSubscriptionQuestionTemplate('Do you want to stay subscribed?'), true)
            ->receives('yes')
            ->assertReply('Awesome! We will keep you updated with the latest news about Laracon EU.');
    }

    private function getSubscriptionQuestionTemplate(string $replyText)
    {
        return Question::create($replyText)->addButtons([
            Button::create('Yes please')->value('yes'),
            Button::create('No')->value('no'),
        ]);
    }


}
