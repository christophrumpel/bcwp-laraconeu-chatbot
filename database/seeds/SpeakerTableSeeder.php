<?php

use App\Speaker;
use Illuminate\Database\Seeder;

class SpeakerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Speaker::truncate();
        Speaker::insert([
            [
                'name' => 'Amanda Folson',
                'twitter_handler' => 'AmbassadorAwsum',
                'photo_url' => 'https://laracon.eu/2018/assets/img/amanda.jpg',
            ],
            [
                'name' => 'Christopher Pitt',
                'twitter_handler' => 'assertchris',
                'photo_url' => 'https://laracon.eu/2018/assets/img/chris.jpg',
            ],
            [
                'name' => 'David McKay',
                'twitter_handler' => 'rawkode',
                'photo_url' => 'https://laracon.eu/2018/assets/img/david.jpg',
            ],
            [
                'name' => 'Erika Heidi',
                'twitter_handler' => 'erikaheidi',
                'photo_url' => 'https://laracon.eu/2018/assets/img/erika.jpg',
            ],
            [
                'name' => 'Jenny Shen',
                'twitter_handler' => 'jennyshen',
                'photo_url' => 'https://laracon.eu/2018/assets/img/jenny.jpg',
            ],
            [
                'name' => 'Marcel Pociot',
                'twitter_handler' => 'marcelpociot',
                'photo_url' => 'https://laracon.eu/2018/assets/img/marcel.jpg',
            ],
            [
                'name' => 'Prosper Otemuyiwa',
                'twitter_handler' => 'unicodeveloper',
                'photo_url' => 'https://laracon.eu/2018/assets/img/prosper.jpg',
            ],
            [
                'name' => 'Ross Tuck',
                'twitter_handler' => 'rosstuck',
                'photo_url' => 'https://laracon.eu/2018/assets/img/ross.png',
            ],
            [
                'name' => 'Taylor Otwell',
                'twitter_handler' => 'taylorotwell',
                'photo_url' => 'https://laracon.eu/2018/assets/img/taylor.jpg',
            ],
            [
                'name' => 'Frank de Jonge',
                'twitter_handler' => 'frankdejonge',
                'photo_url' => 'https://laracon.eu/2018/assets/img/frank.png',
            ],
        ]);
    }
}
