<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Station;
use App\Trip;

class TripController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Trip::all()
        ]);
    }
}
