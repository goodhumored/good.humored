<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function reg(Request $req)
    {
        $data = $req->validate([
            'name' => 'bail|required|min:4|max:30|alpha_dash',
            'email' => 'bail|required|email|unique:App\Models\User,email',
            'password' => "bail|required|min:4|max:30|regex: /[a-zA-Z0-9\\*\\?\\\\&\\(\\)^$@]+/"
        ]);
        User::create($data);
        return response()->json([
            'success' => 'success',
            'message' => __('auth.succ_reg')
        ]);
    }

    public function auth(Request $req)
    {
        $cred = $req->validate([
            'email' => 'bail|required|email',
            'password' => "bail|required|min:4|max:30|regex: /[a-zA-Z0-9\\*\\?\\\\&\\(\\)^$@]+/"
        ]);
        $a = Auth::attempt($cred, true);
        if ($a) {
            return response()->json([
                'success' => 'success',
                'message' => __('auth.succ_auth')
            ]); 
        } else {
            return response()->json([
                'error' => 'error',
                'message' => __('auth.failed')
            ]); 
        }
        // $users = User::where('email', $data['email'])->get();
        // if (count($users)) {
            
        // }
    }
}
