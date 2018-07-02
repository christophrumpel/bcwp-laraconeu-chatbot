<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Attachments\Location;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\Drivers\Facebook\Extensions\Element;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use BotMan\Drivers\Facebook\Extensions\GenericTemplate;

class FaqLocationConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->say('Laracon EU 2018 is located in beautiful Amsterdam. 🇳🇱');

        switch ($this->bot->getDriver()->getName()) {
            case 'Telegram':
                return $this->sendTelegramReply();
            case 'Facebook':
                return $this->sendFacebookReply();
        }
    }

    private function sendTelegramReply()
    {
        $attachment = new Location(52.3832816, 4.9205266);
        $message = OutgoingMessage::create('')->withAttachment($attachment);

        $this->say($message, [
            'title' => 'Laracon EU 2018',
            'address' => 'Kromhouthal Gedempt Hamerkanaal 231 1021 KP Amsterdam, the Netherlands',
        ]);

        $this->say('There is also a map with info about the surrounding: https://snazzymaps.com/embed/69943 ');
    }

    private function sendFacebookReply()
    {
        $message = GenericTemplate::create()->addElement(Element::create('Laracon EU Location')
            ->image('http://screenshots.nomoreencore.com/laracon_map.png')
            ->addButton(ElementButton::create('See surrounding')->url('https://snazzymaps.com/embed/69943 ')));

        $this->say($message);
    }
}
