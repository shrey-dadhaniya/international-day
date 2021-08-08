<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PosterController extends Controller
{
    public function index()
    {
        $days = Day::with('posters')->paginate(50);
//        $days=Day::with('posters','banner')->paginate(5);
//        foreach ($days as $i=> $day){
////            foreach ($day->posters as $k=>$poster){
////                $day->posters[$k]=$poster->getUrl();
////            }
////            foreach ($day->banner as $k=>$banner){
////                $day->banner[$k]=$banner->getUrl();
////            }
//        }
//        return $days;
        return view('poster.index', compact('days'));

    }

    public function create()
    {
        $days = Day::dropdownArray();
        return view('poster.create', compact('days'));
    }

    public function store(Request $request)
    {
        $day = Day::findOrFail($request->day_id);
        $documents = $request->document;
        foreach ($documents ?? [] as $document) {
            $day->addMedia(storage_path('tmp/uploads/' . $document))->toMediaCollection(Day::MEDIA_COLLECTION_POSTER);
            $day->save();
        }
        return redirect()->route('poster.index');
//        dd($day->getPosters());
    }

    public function destroy(Request $request,$id)
    {
        $day=Day::findOrFail($id);
        $day->deletePoster($request->media);
        return redirect()->route('poster.index');
    }
}