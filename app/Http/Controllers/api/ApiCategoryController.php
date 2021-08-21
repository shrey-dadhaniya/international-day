<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\ApiBaseController;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class ApiCategoryController extends ApiBaseController
{
    public function index()
    {
        return $this->json(CategoryResource::collection(Category::filter()->get()->all()));
    }
    public function show(Category $category)
    {
        return $this->json(new CategoryResource($category));
    }
}