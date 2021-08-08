<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagStoreOrUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'tag_name'=>['required']
        ];
    }

    public function authorize()
    {
        return true;
    }
}