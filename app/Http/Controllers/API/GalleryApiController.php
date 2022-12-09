<?php

namespace App\Http\Controllers\API;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryApiController extends Controller
{
    public function index()
    {
        $gallery = Gallery::orderBy("created_at", "DESC")->paginate(6);

        if ($gallery->count() < 1) {
            $data = "Data Anda Belum Tersedia";
        } else {
            $data = [];
            foreach ($gallery as $d) {
                $data[] = [
                    "title_gallery" => $d->title_gallery,
                    "image_gallery" => $d->image_gallery,
                    "created_at" => $d->created_at,
                ];
            }
        }
        return response()->json($data, 200);
    }
}
