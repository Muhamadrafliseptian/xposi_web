<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiLogin;
use App\Models\ProfileCompany;
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
            "data_informasi_login" => InformasiLogin::where("id_user", Auth::user()->id)->orderBy('id','desc')->limit('1')->get(),
            "data_profile" => ProfileCompany::first()
        ];
        return view("pages.admin.dashboard",$data);
    }
    public function login_information()
    {
        $data = [
            "data_informasi_login" => InformasiLogin::where("id_user", Auth::user()->id)->orderBy('id','desc')->limit('10')->get(),
        ];

        return view("pages.admin.login_information.index", $data);
    }
}

