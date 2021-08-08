<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table='countries';

    public static function dropdownArray()
    {
        return self::select('country_id','country_name')->pluck('country_name','country_id')->toArray();
    }
}