<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagStoreOrUpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags=Tag::paginate(10);
        return view('tag.index',compact('tags'));
    }


    public function create()
    {
        return view('tag.create');
    }


    public function store(TagStoreOrUpdateRequest $request)
    {
        Tag::create($request->validated());
        return redirect()->route('tag.index');
    }


    public function edit(Tag $tag)
    {
        return view('tag.edit',compact('tag'));
    }


    public function update(TagStoreOrUpdateRequest $request, Tag $tag)
    {
        $tag->update($request->validated());
        return redirect()->route('tag.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tag.index');
    }
}