<?php

use App\Http\Conversations\PrivacyPersonalDataConversation;
use App\Http\Conversations\PrivacySubscriptionConversation;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Middleware\Dialogflow;
use App\Http\Middleware\AddTypingMiddleware;
use App\Http\Conversations\FaqDateConversation;
use App\Http\Conversations\FaqHotelsConversation;
use App\Http\Conversations\OnboardingConversation;
use App\Http\Conversations\FaqJourneyConversation;
use App\Http\Conversations\FaqLanguageConversation;
use App\Http\Conversations\FaqLocationConversation;
use App\Http\Conversations\FaqScheduleConversation;
use App\Http\Conversations\FaqSpeakersConversation;
use App\Http\Conversations\FaqSponsorsConversation;
use App\Http\Conversations\FaqWhoIsItForConversation;
use App\Http\Conversations\FaqCodeOfConductConversation;

$botman = resolve('botman');

$dialogflow = Dialogflow::create(getenv('DIALOGFLOW_TOKEN'))->listenForAction();
$botman->middleware->received($dialogflow);

$middleware = new AddTypingMiddleware();
$botman->middleware->sending($middleware);

$botman->hears('Hi', function (BotMan $bot) {
    $bot->reply('Hello!');
});

$botman->hears('/start|GET_STARTED', function (BotMan $bot) {
    $bot->startConversation(new OnboardingConversation());
})->stopsConversation();

$botman->group(['middleware' => $dialogflow], function (BotMan $bot) {

    $bot->hears('faq.codeofconduct', function (BotMan $bot) {
        $bot->startConversation(new FaqCodeOfConductConversation());
    })->stopsConversation();

    $bot->hears('faq.date', function (BotMan $bot) {
        $bot->startConversation(new FaqDateConversation());
    })->stopsConversation();

    $bot->hears('faq.hotels', function (BotMan $bot) {
        $bot->startConversation(new FaqHotelsConversation());
    })->stopsConversation();

    $bot->hears('faq.journey', function (BotMan $bot) {
        $bot->startConversation(new FaqJourneyConversation());
    })->stopsConversation();

    $bot->hears('faq.language', function (BotMan $bot) {
        $bot->startConversation(new FaqLanguageConversation());
    })->stopsConversation();

    $bot->hears('faq.location', function (BotMan $bot) {
        $bot->startConversation(new FaqLocationConversation());
    })->stopsConversation();

    $bot->hears('faq.whoisitfor', function (BotMan $bot) {
        $bot->startConversation(new FaqWhoIsItForConversation());
    })->stopsConversation();

    $bot->hears('faq.speakers', function (BotMan $bot) {
        $bot->startConversation(new FaqSpeakersConversation());
    })->stopsConversation();

    $bot->hears('faq.sponsors', function (BotMan $bot) {
        $bot->startConversation(new FaqSponsorsConversation());
    })->stopsConversation();

    $bot->hears('faq.schedule', function (BotMan $bot) {
        $bot->startConversation(new FaqScheduleConversation());
    })->stopsConversation();

    $bot->hears('privacy.subscription', function (BotMan $bot) {
        $bot->startConversation(new PrivacySubscriptionConversation());
    })->stopsConversation();

    $bot->hears('privacy.personaldata', function (BotMan $bot) {
        $bot->startConversation(new PrivacyPersonalDataConversation());
    })->stopsConversation();
});




