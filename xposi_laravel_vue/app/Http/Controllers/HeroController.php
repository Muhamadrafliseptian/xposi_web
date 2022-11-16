<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Http\Controllers\Controller;

class HeroController extends Controller
{
    public function index (){
        $data = [
            "data_hero" => Hero::get()
        ];
    return view("pages.admin.hero.index", $data);
    }

    public function store (Request $request){
        if ($request->file("image")){
            $data = $request->file("image")->store("hero");
        }

        Hero::create ([
            "icon" => $request->icon,
            "title" => $request->title,
            "description" => $request->description,
            "image" => url("/storage/". $data),
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil ditambahkan', 'success');</script>");
    }
}
