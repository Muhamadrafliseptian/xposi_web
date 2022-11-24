<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HowBook;
use Illuminate\Http\Request;

class HowBookApiController extends Controller
{
    public function index()
    {
        $data = HowBook::first();

        if (empty($data)) {
            return response()->json([["message" => "Data Tidak Ada"]]);
        } else {
            return response()->json([$data]);
        }

    }
}
