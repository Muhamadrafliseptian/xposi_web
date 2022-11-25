<?php

namespace App\Http\Controllers\API;

use App\Models\Features;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeaturesApiController extends Controller
{
    public function index (){
        $data = Features::first();

        if (empty($data)) {
            return response()->json([["message" => "Data Not Found"]]);
        } else {
            return response()->json([$data]);
        }
    }
}
