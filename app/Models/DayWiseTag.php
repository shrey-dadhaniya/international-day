<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DayWiseTag extends Model
{
    public $timestamps = false;
    protected $table = 'day_wise_tag';
    protected $fillable = ['day_id', 'tag_id'];
}