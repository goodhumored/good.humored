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
        $data['password'] = hash('sha256', $data['password']);
        $user = User::create($data);
        Auth::login($user);
        $req->session()->push('messages',['succ', __('auth.succ_auth')]);
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
        $user = User::where([
            ['email', '=', $cred['email']],
            ['password', '=', hash('sha256', $cred['password'])]
        ])->get();
        if (count($user)) {
            Auth::login($user[0]);
            $req->session()->push('messages',['succ', __('auth.succ_auth')]);
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
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('home'));
    }
}
