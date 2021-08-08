<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'category';
    protected $fillable = ['id', 'category_name', 'created_at', 'updated_at', 'deleted_at'];

    public static function dropdownArray()
    {
        return self::select('id','category_name')->pluck('category_name','id')->toArray();
    }
}