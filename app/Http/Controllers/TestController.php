<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function echo(Request $request)
    {
        return dd($request);
    }
}
