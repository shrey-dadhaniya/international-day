<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\day\DayShowResource;
use App\Http\Resources\day\DayResource;
use App\Models\Day;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiDayController extends ApiBaseController
{
    function index(Request $request)
    {
        return DayResource::collection(Day::filter()->paginate(config('global.pagination_records')));
    }

    function show(Day $day){
        return new DayShowResource($day);
    }
}