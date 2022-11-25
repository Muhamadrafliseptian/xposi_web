<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index (){
        $data = [
        "data_about" => About::select("id", "title_about", "image_about", "description_about")->first()

        ];
    return view("pages.admin.about.index", $data);
    }

    public function store (Request $request){
        if ($request->file("image_about")){
            $data = $request->file("image_about")->store("about");
        }

        About::create ([
            "title_about" => $request->title_about,
            "description_about" => $request->description_about,
            "image_about" => url("/storage/". $data),
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil ditambahkan', 'success');</script>");
    }
    public function update(Request $request, $id)
    {
        if ($request->file("image_about")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }

            $image_about = $request->file("image_about")->store("about");

            $data = url("/storage/" . $image_about);
        } else {
            $data = url('') . "/storage/" . $request->gambarLama;
        }

        About::where("id", decrypt($id))->update([
            "image_about" => $data,
            "title_about" => $request->title_about,
            "description_about" => $request->description_about,
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }
}
