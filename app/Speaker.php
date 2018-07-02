<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    public static function asTextMessage()
    {
        return static::all()->pluck('name')->transform(function ($speaker) {
            return '➡️ '.$speaker;
        })->implode("\n");
    }
}
