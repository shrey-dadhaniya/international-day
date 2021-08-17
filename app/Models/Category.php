<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    public const MEDIA_COLLECTION_BANNER = 'banner';

    protected $table = 'category';
    protected $fillable = ['id', 'category_name', 'created_at', 'updated_at', 'deleted_at'];

    public static function dropdownArray()
    {
        return self::select('id', 'category_name')->pluck('category_name', 'id')->toArray();
    }

    public function addBanner($file)
    {
        $this->addMedia($file)->toMediaCollection(Category::MEDIA_COLLECTION_BANNER);
        $this->save();
    }

    public function getBannerUrlAttribute()
    {
        if ($this->hasMedia(Category::MEDIA_COLLECTION_BANNER)) {
            return $this->getFirstMedia(Category::MEDIA_COLLECTION_BANNER)->getUrl();
        }
        return null;
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(Category::MEDIA_COLLECTION_BANNER)->singleFile();
    }
}