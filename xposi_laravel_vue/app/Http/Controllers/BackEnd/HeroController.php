<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index (){
        $data = [
        "data_hero" => Hero::select("id", "icon_hero", "title_hero", "image_hero", "description_hero")->first()

        ];
    return view("pages.admin.hero.index", $data);
    }

    public function store (Request $request){
        if ($request->file("image_hero")){
            $data = $request->file("image_hero")->store("hero");
        }

        Hero::create ([
            "icon_hero" => $request->icon_hero,
            "title_hero" => $request->title_hero,
            "description_hero" => $request->description_hero,
            "image_hero" => url("/storage/". $data),
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil ditambahkan', 'success');</script>");
    }
    public function update(Request $request, $id)
    {
        if ($request->file("image_hero")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }

            $image_hero = $request->file("image_hero")->store("hero");

            $data = url("/storage/" . $image_hero);
        } else {
            $data = url('') . "/storage/" . $request->gambarLama;
        }

        Hero::where("id", decrypt($id))->update([
            "image_hero" => $data,
            "icon_hero" => $request->icon_hero,
            "title_hero" => $request->title_hero,
            "description_hero" => $request->description_hero,
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }
}
