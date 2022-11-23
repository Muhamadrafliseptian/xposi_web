<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(){

        $data = [
            "data_gallery" => Gallery::get()
        ];
        return view ("pages.admin.gallery.index", $data);
    }
    public function store(Request $request)
    {
        if ($request->file("image_gallery")) {
            $data = $request->file("image_gallery")->store("gallery");
        }

        Gallery::create([
            "title_gallery" => $request->title_gallery,
            "image_gallery" => url("/storage/".$data),
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }
    public function edit(Request $request)
    {
        $data = [
            "edit" => Gallery::where("id", $request->id)->first()
        ];

        return view("pages.admin.gallery.edit", $data);
    }

    public function update(Request $request)
    {
        if ($request->file("image_gallery")) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $image_gallery = $request->file("image_gallery")->store("gallery");

            $data = url("/storage/" . $image_gallery);
        } else {
            $data = url('') . "/storage/" . $request->oldImage;
        }

        Gallery::where("id", $request->id)->update([
            "image_gallery" => $data,
            "title_gallery" => $request->title_gallery
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }
    public function destroy($id)
    {
        $gallery = Gallery::where("id", $id)->first();

        $hasil = trim($gallery->image_gallery, url('/'));

        $print = substr($hasil, 8);

        Storage::delete($print);

        $gallery->delete();

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
