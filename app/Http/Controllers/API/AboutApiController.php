<?php

namespace App\Http\Controllers\API;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutApiController extends Controller
{
    public function index (){

        $data = About::first();

        if (empty($data)) {
            return response()->json([["message" => "Data Not Found"]]);
        } else {
            return response()->json([$data]);
        }
    }
}
