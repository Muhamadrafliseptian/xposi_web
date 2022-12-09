<?php

namespace App\Http\Controllers\API;

use App\Models\Features;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeaturesApiController extends Controller
{
    public function index()
    {
        $features = Features::orderBy("created_at", "DESC")->paginate(6);

        if ($features->count() < 1) {
            $data = "Data Anda Belum Tersedia";
        } else {
            $data = [];
            foreach ($features as $d) {
                $data[] = [
                    "icon_features" => $d->icon_features,
                    "title_features" => $d->title_features,
                    "description_features" => $d->description_features,
                ];
            }
        }
        return response()->json($data, 200);
    }
}
