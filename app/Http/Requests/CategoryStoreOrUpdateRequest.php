<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreOrUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'category_name'=>['required']
        ];
    }

    public function authorize()
    {
        return true;
    }
}