<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mehradsadeghi\FilterQueryString\FilterQueryString;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Day extends Model implements HasMedia
{
    use InteractsWithMedia;
    use FilterQueryString;

    public const MEDIA_COLLECTION_BANNER = 'banner';
    public const MEDIA_COLLECTION_POSTER = 'poster';
    protected $table = 'day';
    protected $fillable = ['id', 'category_id', 'country_id', 'day_name', 'day_description', 'day_date'];
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
        'category_id',
        'country_id',
        'day_name',
        'day_description',
        'day_date'
    ];


    public static function dropdownArray()
    {
        return self::select('id', 'day_name')->pluck('day_name', 'id')->toArray();
    }

    public function addBanner($file)
    {
        $this->addMedia($file)->toMediaCollection(Day::MEDIA_COLLECTION_BANNER);
        $this->save();
    }

    public function getBannerUrlAttribute()
    {
        if ($this->hasMedia(self::MEDIA_COLLECTION_BANNER)) {
            return $this->getFirstMedia(self::MEDIA_COLLECTION_BANNER)->getUrl();
        }
        return null;
    }

    public function banner()
    {
        return $this->media()->where('collection_name',Day::MEDIA_COLLECTION_BANNER);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::MEDIA_COLLECTION_BANNER)->singleFile();
    }

    public function posters()
    {
        return $this->media()->where('collection_name',Day::MEDIA_COLLECTION_POSTER);
    }

    public function getPostersUrlWithUuid()
    {
        return $this->media()->where('collection_name',Day::MEDIA_COLLECTION_POSTER)->get()->map(function ($d){
            return (object)[
                'uuid'=>$d->uuid,
                'url'=>$d->getUrl()
            ];
        });
    }

    public function deletePoster($id)
    {
        $this->getMedia(Day::MEDIA_COLLECTION_POSTER)->find($id)->delete();
        $this->save();
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'day_wise_tag', 'day_id', 'tag_id');
    }

    public function tagsToArray()
    {
        return $this->belongsToMany(Tag::class, 'day_wise_tag', 'day_id', 'tag_id')->pluck('id')->toArray();
    }

    public function addTags($tags)
    {
        DayWiseTag::where('day_id', $this->id)->delete();
        foreach ($tags ?? [] as $tag) {
            DayWiseTag::create(['day_id' => $this->id, 'tag_id' => $tag]);
        }
    }
}