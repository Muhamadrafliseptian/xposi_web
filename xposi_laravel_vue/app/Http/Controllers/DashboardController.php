<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiLogin;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $data = [
            "data_informasi_login" => InformasiLogin::where("id", Auth::user()->id)->get()
        ];
        return view("pages.admin.dashboard", $data);
    }
    public function dashboard()
    {
        $data = [
            "data_informasi_login" => InformasiLogin::where("id", Auth::user()->id)->get()
        ];
        return view("pages.admin.dashboard",$data);
    }
}

