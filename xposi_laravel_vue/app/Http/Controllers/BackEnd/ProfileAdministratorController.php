<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileAdministratorController extends Controller
{
    public function index()
    {
        $data = [
            "data_profile_administrator" => User::first()
        ];
        return view("pages.admin.profile_administrator.index", $data);
    }

    public function update(Request $request, $id)
    {
        if ($request->file("foto")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }

            $data = $request->file("foto")->store("users");
        } else {
            $data = $request->gambarLama;
        }

        User::where("id", decrypt($id))->update([
            "nama" => $request->nama,
            "email" => $request->email,
            "foto" => $data
        ]);

        return redirect()->back();
    }

    public function simpan(Request $request)
    {
        if ($request->ganti_password != $request->konfirmasi_password) {
            return redirect()->back();
        } else {
            User::where("id", Auth::user()->id)->update([
                "password" => bcrypt($request->ganti_password)
            ]);

            return redirect()->back();
        }
    }
}
