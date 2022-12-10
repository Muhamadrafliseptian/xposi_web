<?php

namespace App\Http\Controllers\API;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageApiController extends Controller
{
    public function store(Request $request)
    {
        Message::create([
            "message_name" => $request->message_name,
            "message_email" => $request->message_email,
            "message_subject" => $request->message_subject,
            "message_text" => $request->message_text
        ]);

        return response()->json(['message' => "Data Berhasil di Tambahkan"]);
    }
}
