<?php

namespace App\Http\Controllers\api;

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
        return $this->json(DayResource::collection(Day::filter()->get()->all()));
    }

    function show(Day $day){
        return $this->json(new DayShowResource($day));
    }
}