<?php

namespace App\Http\Controllers;

use App\Http\Requests\DayStoreRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\Day;
use App\Models\Tag;

class DayController extends Controller
{
    public function index()
    {
        $days = Day::paginate(10);
        return view('day.index', compact('days'));
    }

    public function create()
    {
        $tag_dropdown_array = Tag::dropdownArray();
        $category_dropdown_array = Category::dropdownArray();
        $country_dropdown_array = Country::dropdownArray();
        return view('day.create', compact('tag_dropdown_array', 'category_dropdown_array', 'country_dropdown_array'));
    }

    public function store(DayStoreRequest $request)
    {
        $day = Day::create($request->validated());
        $day->addTags($request->get('tags'));
        if ($request->hasFile('banner-file')) {
            $day->addMedia($request->file('banner-file'))->toMediaCollection(Day::MEDIA_COLLECTION_BANNER);
            $day->save();
        }
        return redirect()->route('day.index');
    }

    public function edit(Day $day)
    {
//        dd($day->tagsToArray());
        $tag_dropdown_array = Tag::dropdownArray();
        $category_dropdown_array = Category::dropdownArray();
        $country_dropdown_array = Country::dropdownArray();
        return view('day.edit',compact('day','tag_dropdown_array', 'category_dropdown_array', 'country_dropdown_array'));
    }

    public function update(DayStoreRequest $request, Day $day)
    {
        $day->update($request->validated());
        $day->addTags($request->get('tags'));
        if ($request->hasFile('banner-file')) {
            $day->removeOldBanner();
            $day->addMedia($request->file('banner-file'))->toMediaCollection(Day::MEDIA_COLLECTION_BANNER);
            $day->save();
        }
        return redirect()->route('day.index');
    }
    public function destroy(Day $day)
    {
        $day->delete();
        return redirect()->route('day.index');
    }
}