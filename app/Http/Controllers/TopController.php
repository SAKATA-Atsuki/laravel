<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{
    //
    public function index()
    {
        return view('top.index');
    }

    public function getLogin(Request $request)
    {
        return view('top.login');
    }

    public function postLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('top');
        } else {
            return view('top.login');
        }
    }
}
