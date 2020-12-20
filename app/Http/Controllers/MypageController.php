<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index(Request $request)
    {
        return view('mypage.index');
    }

    public function confirm(Request $request)
    {
        return view('mypage.confirm');
    }

    public function delete(Request $request)
    {
        Auth::user()->delete();
        return redirect()->route('top');
    }
}
