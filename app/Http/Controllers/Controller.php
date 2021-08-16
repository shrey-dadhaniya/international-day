<?php

namespace App\Http\Controllers;

use App\Http\Resources\day\DayShowResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function json($data,$httpStatus=Response::HTTP_OK,$status=true)
    {
        return response()->json([
            'success' => $status,
            'data' =>$data,
        ], $httpStatus);
    }
}
