<?php

namespace App\Http\Controllers\API;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryApiController extends Controller
{
    public function index (){

        $data = Gallery::first();

        if (empty($data)) {
            return response()->json([["message" => "Data Not Found"]]);
        } else {
            return response()->json([$data]);
        }
    }
}
