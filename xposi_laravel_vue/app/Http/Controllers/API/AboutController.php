<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
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
