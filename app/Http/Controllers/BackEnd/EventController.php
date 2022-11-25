<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(){
        $data = [
            "data_event" => Event::get()
        ];
        return view ("pages.admin.event_newest.index", $data);
    }
    public function create(){
        return view ("pages.admin.event_newest.add");
    }
    public function store (Request $request){

        if ($request->file("event_image")) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $event_image = $request->file("event_image")->store("event");

            $data = url("/storage/" . $event_image);
        } else {
            $data = url('') . "/storage/" . $request->oldImage;
        }

        Event::create([
            "event_image" => $data,
            "event_name" => $request->event_name,
            "event_description" => $request->event_description,
            "event_price" => $request->event_price,
            "event_time" => $request->event_time,
            "event_date" => $request->event_date
        ]);

        return redirect("admin/event_newest");
    }
    public function edit($id)
    {
        $data = [
            "edit" => Event::where("id", decrypt($id))->first()
        ];

        return view("pages.admin.event_newest.edit", $data);
    }
    public function update(Request $request, $id){

        if ($request->file("event_image")) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $event_image = $request->file("event_image")->store("event");

            $data = url("/storage/" . $event_image);
        } else {
            $data = url('') . "/storage/" . $request->oldImage;
        }

        Event::where("id", $id)->update([
            "event_image" => $data,
            "event_name" => $request->event_name,
            "event_description" => $request->event_description,
            "event_price" => $request->event_price,
            "event_time" => $request->event_time,
            "event_date" => $request->event_date
        ]);

        return redirect ("admin/event_newest");
    }
}
