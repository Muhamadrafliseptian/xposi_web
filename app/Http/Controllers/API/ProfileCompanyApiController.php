<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProfileCompany;
use Illuminate\Http\Request;

class ProfileCompanyApiController extends Controller
{
    public function index(){
        $profil = ProfileCompany::first();

        if (empty($data)) {
            return response()->json([["message" => "Data Not Found"]]);
        } else {
            return response()->json([$profil], 200);
        }
    }
}
