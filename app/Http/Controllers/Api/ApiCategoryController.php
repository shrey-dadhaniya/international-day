<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiBaseController;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class ApiCategoryController extends ApiBaseController
{
    public function index()
    {
        return CategoryResource::collection(Category::filter()->paginate(config('global.pagination_records')));
    }
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }
}