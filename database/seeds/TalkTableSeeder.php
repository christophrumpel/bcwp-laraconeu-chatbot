<?php

use App\Talk;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TalkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Talk::truncate();

        Talk::insert([
            [
                'speaker_id' => 1,
                'title' => 'How To Survive A PHP developer',
                'start_at' => Carbon::create('2018', '08', '30', '09', '30')
            ],
            [
                'speaker_id' => 2,
                'title' => 'All You Need To Know About Event Sourcing',
                'start_at' => Carbon::create('2018', '08', '30', '09', '30')
            ],
            [
                'speaker_id' => 3,
                'title' => 'Alfred Is You Best Friend',
                'start_at' => Carbon::create('2018', '08', '30', '10', '30')
            ],
            [
                'speaker_id' => 4,
                'title' => 'AI For This And That',
                'start_at' => Carbon::create('2018', '08', '30', '10', '30')
            ],
            [
                'speaker_id' => 5,
                'title' => 'Here Is What Is New In Laravel 2010',
                'start_at' => Carbon::create('2018', '08', '30', '11', '30')
            ],
            [
                'speaker_id' => 8,
                'title' => 'React 101',
                'start_at' => Carbon::create('2018', '08', '31', '09', '30')
            ],
            [
                'speaker_id' => 9,
                'title' => 'How I Use Laravel For The CIA',
                'start_at' => Carbon::create('2018', '08', '31', '10', '30')
            ],
            [
                'speaker_id' => 6,
                'title' => 'Me, My Mum, and Web Security',
                'start_at' => Carbon::create('2018', '08', '31', '13', '45')
            ],
            [
                'speaker_id' => 7,
                'title' => 'What Google Will Not Tell You About The Web',
                'start_at' => Carbon::create('2018', '08', '31', '13', '45')
            ],
        ]);
    }
}
