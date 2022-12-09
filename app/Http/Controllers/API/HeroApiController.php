<?php

namespace App\Http\Controllers\API;

use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HeroApiController extends Controller
{
    public function index()
    {
        $data = Hero::first();

        if (empty($data)) {
            return response()->json([["message" => "Data Tidak Ada"]]);
        } else {
            return response()->json([$data]);
        }

    }
}
