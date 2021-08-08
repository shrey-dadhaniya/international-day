<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DayStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'category_id'=>['required'],
            'country_id'=>['required'],
            'day_name'=>['required'],
            'day_description'=>['required'],
            'day_date'=>['required'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}