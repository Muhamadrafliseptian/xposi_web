<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Models\ProfileCompany;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfileCompanyController extends Controller
{
     public function index()
    {
        $data = [
            "data_profile" => ProfileCompany::first()
        ];

        return view("pages.admin.profile_company.index", $data);
    }

    public function store(Request $request)
    {
        if ($request->file("company_image")) {
            $data = $request->file("company_image")->store("profile_company");
        }

        ProfileCompany::create([
            "company_image" => url("/storage") . "/" . $data,
            "company_name" => $request->company_name,
            "company_address" => $request->company_address,
            "company_email" => $request->company_email,
            "company_phone_number" => $request->company_phone_number,
            "company_description" => $request->company_description,
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }

    public function update(Request $request, $id)
    {
        if ($request->file("company_image")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }

            $company_image = $request->file("company_image")->store("profile_company");

            $data = url("/storage/" . $company_image);
        } else {
            $data = url('') . "/storage/" . $request->gambarLama;
        }

        ProfileCompany::where("id", decrypt($id))->update([
            "company_image" => $data,
            "company_name" => $request->company_name,
            "company_address" => $request->company_address,
            "company_email" => $request->company_email,
            "company_phone_number" => $request->company_phone_number,
            "company_description" => $request->company_description,
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }
}
