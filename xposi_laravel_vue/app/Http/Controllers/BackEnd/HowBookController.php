<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\HowBook;
use Illuminate\Http\Request;

class HowBookController extends Controller
{
    public function index(){
        $data = [
            "data_book" => HowBook::get()
        ];
        return view ("pages.admin.how_book.index", $data);
    }
    public function create(){
        return view ("pages.admin.how_book.add");
    }

    public function store (Request $request){
        HowBook::create([
            "icon_book" => $request->icon_book,
            "title_book" => $request->title_book,
            "description_book" => $request->description_book
        ]);

        return redirect("admin/how_book");
    }

    public function edit($id)
    {
        $data = [
            "edit" => HowBook::where("id", decrypt($id))->first()
        ];

        return view("pages.admin.how_book.edit", $data);
    }

    public function update(Request $request, $id){

        HowBook::where("id", $id)->update([
            "icon_book" => $request->icon_book,
            "title_book" => $request->title_book,
            "description_book" => $request->description_book
        ]);

        return redirect ("admin/how_book");
    }

    public function destroy ($id){

        $how_book = HowBook::where("id", $id)->first();
        $how_book->delete();

        return redirect ("admin/how_book");
    }
}
