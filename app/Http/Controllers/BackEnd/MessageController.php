<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $data = [
            "data_message" => Message::get()
        ];

        return view("pages.admin.message.index", $data);
    }
}
