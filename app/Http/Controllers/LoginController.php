<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiLogin;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("pages.admin.auth.login");
    }

    public function post_login(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if (Auth::attempt($credentials)) {

            InformasiLogin::create([
                "id_user" => Auth::user()->id,
                "nama" => Auth::user()->nama
            ]);

            $request->session()->regenerate();

            return redirect()->intended('/admin/dashboard');
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect("/admin/login");
    }
}
