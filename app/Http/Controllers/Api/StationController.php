<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Station;

class StationController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Station::all()
        ]);
    }
}
