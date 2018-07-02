<?php

namespace Tests\BotMan;

use App\Subscriber;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PrivacyPersonalDataConversationTest extends TestCase
{

    use DatabaseMigrations;

    public function test_no_subscriber_given()
    {
        $this->bot->receives('privacy.personaldata')
            ->assertReply('We haven\'t stored any personal data of yours, because you are currently not subscribed to notifications. If you subscribe, we will store only your name and chat ID.');
    }

    public function test_subscriber_given()
    {
        Subscriber::create(['chat_id' => '123', 'driver' => 'Telegram', 'first_name' => 'John']);

        $this->bot->setUser(['id' => '123'])
            ->receives('privacy.personaldata')
            ->assertReply('You are subscribed to notifications. As a result we have stored your name John and your chat id: 123');
    }
}
