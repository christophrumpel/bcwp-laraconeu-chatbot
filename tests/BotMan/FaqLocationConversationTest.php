<?php

namespace Tests\BotMan;

use Tests\TestCase;
use BotMan\Drivers\Facebook\FacebookDriver;
use BotMan\Drivers\Telegram\TelegramDriver;
use BotMan\Drivers\Facebook\Extensions\Element;
use BotMan\BotMan\Messages\Attachments\Location;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use BotMan\Drivers\Facebook\Extensions\GenericTemplate;

class FaqLocationConversationTest extends TestCase
{
    public function test_it_shows_telegram_location()
    {
        $attachment = new Location(52.3832816, 4.9205266);
        $message = OutgoingMessage::create('')->withAttachment($attachment);

        $this->bot->setDriver(TelegramDriver::class)
            ->receives('faq.location')
            ->assertReply('Laracon EU 2018 is located in beautiful Amsterdam. 🇳🇱')
            ->assertTemplate($message, true);
    }

    public function test_it_shows_facebook_location()
    {
        $message = GenericTemplate::create()->addElement(Element::create('Laracon EU Location')
            ->image('http://screenshots.nomoreencore.com/laracon_map.png')
            ->addButton(ElementButton::create('See surrounding')->url('https://snazzymaps.com/embed/69943 ')));

        $this->bot->setDriver(FacebookDriver::class)
            ->receives('faq.location')
            ->assertReply('Laracon EU 2018 is located in beautiful Amsterdam. 🇳🇱')
            ->assertTemplate($message, true);
    }
}
