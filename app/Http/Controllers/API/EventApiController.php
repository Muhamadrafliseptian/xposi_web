<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventApiController extends Controller
{
    public function index()
    {
        $event = Event::orderBy("created_at", "DESC")->paginate(6);

        if ($event->count() < 1) {
            $data = "Data Anda Belum Tersedia";
        } else {
            $data = [];
            foreach ($event as $d) {
                $data[] = [
                    "event_image" => $d->event_image,
                    "event_name" => $d->event_name,
                    "event_description" => $d->event_description,
                    "event_price" => $d->event_price,
                    "event_time" => $d->event_time,
                    "event_date" => $d->event_date
                ];
            }
        }
        return response()->json($data, 200);
    }
}
