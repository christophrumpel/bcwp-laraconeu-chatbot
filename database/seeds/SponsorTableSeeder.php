<?php

use App\Sponsor;
use Illuminate\Database\Seeder;

class SponsorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sponsor::truncate();
        Sponsor::insert([
            [
                'name' => 'Nexmo',
                'description' => 'Create innovative and delightful customer experiences with programmable communication building blocks from Nexmo.',
                'image_url' => 'http://screenshots.nomoreencore.com/laracon_sponsors.png',
                'url' => 'https://www.nexmo.com/',
            ],
            [
                'name' => 'Vehikl',
                'description' => 'Exceptional Web Applications',
                'image_url' => 'http://screenshots.nomoreencore.com/laracon_sponsors.png',
                'url' => 'https://vehikl.com/',
            ],
            [
                'name' => 'Iblux',
                'description' => 'Making industrial companies work smarter',
                'image_url' => 'http://screenshots.nomoreencore.com/laracon_sponsors.png',
                'url' => 'https://www.iblux.nl/',
            ],
            [
                'name' => 'Laravel Certification Program',
                'description' => 'Stand out. Get Certified.',
                'image_url' => 'http://screenshots.nomoreencore.com/laracon_sponsors.png',
                'url' => 'https://laravel.com/certification/',
            ],
            [
                'name' => 'Aimeos',
                'description' => 'High Performance E-Commerce Framework"',
                'image_url' => 'http://screenshots.nomoreencore.com/laracon_sponsors.png',
                'url' => 'https://aimeos.org/',
            ],
            [
                'name' => 'Enrise',
                'description' => '',
                'image_url' => 'http://screenshots.nomoreencore.com/laracon_sponsors.png',
                'url' => 'https://enrise.com/',
            ],
            [
                'name' => 'DG',
                'description' => 'Welcome to DQ. The digital agency.',
                'image_url' => 'http://screenshots.nomoreencore.com/laracon_sponsors.png',
                'url' => 'https://www.nexmo.com/',
            ],
            [
                'name' => 'PHP Professionals',
                'description' => '',
                'image_url' => 'http://screenshots.nomoreencore.com/laracon_sponsors.png',
                'url' => 'https://www.php-professionals.nl/',
            ],
            [
                'name' => 'Way2Web.',
                'description' => '',
                'image_url' => 'http://screenshots.nomoreencore.com/laracon_sponsors.png',
                'url' => 'https://www.way2web.nl/',
            ],

        ]);
    }
}
