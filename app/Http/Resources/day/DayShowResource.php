<?php

namespace App\Http\Resources\day;

use App\Http\Resources\tag\TagResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DayShowResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"=> $this->id,
            "category_id"=> $this->category_id,
            "country_id"=> $this->country_id,
            "day_name"=> $this->day_name,
            "day_description"=> $this->day_description,
            "day_date"=> $this->day_date,
            "banner_image"=>$this->banner_url,
            "posters"=>$this->getPostersUrlWithUuid(),
            "tags"=>TagResource::collection($this->tags)
        ];
    }
}
