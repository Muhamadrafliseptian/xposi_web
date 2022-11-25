<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventApiController extends Controller
{
    public function index()
    {
        $data = Event::first();

        if (empty($data)) {
            return response()->json([["message" => "Data Tidak Ada"]]);
        } else {
            return response()->json([$data]);
        }

    }
}
