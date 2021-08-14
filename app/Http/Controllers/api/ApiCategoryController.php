<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class ApiCategoryController extends Controller
{
    public function index()
    {
        return $this->json(CategoryResource::collection(Category::all()));
    }
    public function show(Category $category)
    {
        return $this->json(new CategoryResource($category));
    }
}