<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\day\DayShowResource;
use App\Http\Resources\day\DayResource;
use App\Models\Day;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiDayController extends Controller
{
    function index(Request $request)
    {
        $query=Day::query();
        if($request->has('day_date')){
            $carbon=Carbon::parse($request->get('day_date'));
            $query=$query->whereDay('day_date',$carbon->format('d'));
            $query=$query->whereMonth('day_date',$carbon->format('m'));
        }
        if ($request->has('category_id')) $query=$query->where('category_id',$request->get('category_id'));
        if ($request->has('country_id')) $query=$query->where('country_id',$request->get('country_id'));
        return $this->json(DayResource::collection($query->get()));
    }

    function show(Day $day){
        return $this->json(new DayShowResource($day));
    }
}