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

    public function information(Request $request)
    {
        return view('mypage.edit.information');
    }

    public function informationCheck(Request $request)
    {
        $data = $request->all();
        return view('mypage.edit.check', compact('data'));
    }

    public function informationStore(Request $request)
    {

    }

    public function password(Request $request)
    {
        return view('mypage.edit.password');
    }

    public function email(Request $request)
    {
        return view('mypage.edit.email');
    }
}
