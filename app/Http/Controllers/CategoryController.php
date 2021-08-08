<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreOrUpdateRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryStoreOrUpdateRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    public function update(CategoryStoreOrUpdateRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('category.index');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}