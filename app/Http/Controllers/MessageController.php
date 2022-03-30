<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function send(Request $req)
    {
        $validation = $req->validate([
            'text' => 'bail|min:1|max:600|required'
        ]);
        return json_encode(['status' => 'ok']);
    }
}
