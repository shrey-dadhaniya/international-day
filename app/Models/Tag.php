<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;
    protected $table = 'tag';
    protected $fillable = ['id', 'tag_name', 'created_at', 'updated_at', 'deleted_at'];

    public static function dropdownArray()
    {
        return self::select('id','tag_name')->pluck('tag_name','id')->toArray();
    }
}