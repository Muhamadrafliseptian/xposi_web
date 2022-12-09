<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HowBook;
use Illuminate\Http\Request;

class HowBookApiController extends Controller
{
    public function index()
    {
        $book = HowBook::orderBy("created_at", "DESC")->paginate(6);

        if ($book->count() < 1) {
            $data = "Data Anda Belum Tersedia";
        } else {
            $data = [];
            foreach ($book as $d) {
                $data[] = [
                    "icon_book" => $d->icon_book,
                    "title_book" => $d->title_book,
                    "description_book" => $d->description_book,
                ];
            }
        }
        return response()->json($data, 200);
    }
}
