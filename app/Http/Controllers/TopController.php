<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{
    //
    public function index(Request $request)
    {
        $request->session()->forget('product_search');
        return view('index');
    }
}
