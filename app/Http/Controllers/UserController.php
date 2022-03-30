<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function reg(Request $req)
    {
        $validate = $req->validate([
            'name' => 'bail|requiered|min:4|max:30|alpha_num',
            'email' => 'bail|requiered|email|unique:App\Models\User,email_address',
            'password' => 'bail|requiered|email|unique:App\Models\User,email_address'
        ]);
    }

    public function auth(Request $req)
    {
        $validate = $req->validate([
            'name' => 'bail|requiered|min:4|max:30|alpha_num',
            'email' => 'bail|requiered|email|unique:App\Models\User,email_address',
            'password' => 'bail|requiered|email|unique:App\Models\User,email_address'
        ]);
    }
}
