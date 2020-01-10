<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $guarded = [];

    protected $dates = ['confirmed_at'];

    public static function friendship($userId)
    {

    }
}
