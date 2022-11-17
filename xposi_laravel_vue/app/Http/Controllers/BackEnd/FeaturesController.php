<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Features;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeaturesController extends Controller
{
    public function index (){
        $data = [
            "data_features" => Features::get()
        ];

        return view ("pages.admin.features.index", $data);
    }

    public function create(){
        return view ("pages.admin.features.add");
    }

    public function store (Request $request){
        Features::create([
            "icon_features" => $request->icon_features,
            "title_features" => $request->title_features,
            "description_features" => $request->description_features
        ]);

        return redirect("admin/features");
    }

    public function edit($id)
    {
        $data = [
            "edit" => Features::where("id", decrypt($id))->first()
        ];

        return view("pages.admin.features.edit", $data);
    }

    public function update(Request $request, $id){

        Features::where("id", $id)->update([
            "icon_features" => $request->icon_features,
            "title_features" => $request->title_features,
            "description_features" => $request->description_features
        ]);

        return redirect ("admin/features");
    }

    public function destroy ($id){

        $features = Features::where("id", $id)->first();
        $features->delete();

        return redirect ("admin/features");
    }
}
