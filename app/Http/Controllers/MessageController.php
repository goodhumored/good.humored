<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{    
    /**
     * Sends message to chat
     *
     * @param  mixed $req
     * @return void
     */
    public function send(Request $req)
    {
        $data = $req->validate([
            'text' => 'bail|min:1|max:600|required',
            'att'  => 'required_if:text,null|numeric',
            'pid'  => 'bail|required|exists:chats,id',
        ]);
        $msg = Message::create([
            'text'          => $data['text'] ?? '',
            'attachment_id' => $data['att'] ?? null,
            'peer_id'       => $data['pid'] ?? 1,
            'from_id'       => $req->user()->id
        ]);
        $msg->save();
        return response()->json([
            'success' => 'success',
            'message' => 'sent'
        ]);
    }
    
    /**
     * deletes message
     *
     * @param  mixed $req
     * @return void
     */
    public function delete(Request $req)
    {
        $data = $req->validate([
            'mid'  => 'bail|required|exists:messages,id',
        ]);
        $message = Message::findOrFail($data['mid']);  // Getting message object
        if ($message->from_id != $req->user()->id)  // if user is not author of message return error
            abort(403);
        $message->delete();
    }
}
