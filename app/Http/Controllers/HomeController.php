<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $req)
    {
        if (Auth::user()) {
            $member = \App\Models\ChatMember::where([
                ['user_id', '=', $req->user()->id],
                ['chat_id', '=', 1]
            ])->first();
            $member->last_online = Carbon::now();
            $member->save();
        }
        return view('home', ['chat' => Chat::find(1)]);
    }
}
