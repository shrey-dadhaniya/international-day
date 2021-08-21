<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mehradsadeghi\FilterQueryString\FilterQueryString;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use FilterQueryString;

    public const MEDIA_COLLECTION_BANNER = 'banner';

    protected $table = 'category';
    protected $fillable = ['id', 'category_name'];
    protected $filters = [
        'sort',
        'in',
        'like',
        'greater',
        'greater_or_equal',
        'less',
        'less_or_equal',
        'between',
        'not_between',
        'id',
        'category_name',
    ];

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