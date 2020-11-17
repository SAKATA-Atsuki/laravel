<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Requests\MemberRequest;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    //
    public function getIndex(Request $request)
    {
        if ($request->action == 'rewrite')
        {
            $session_join = $request->session()->get('join');
            return view('join.index', compact('session_join'));
        } else {
            return view('join.index');
        }
    }

    public function postIndex(MemberRequest $request)
    {
        $request->session()->put('join', $request->all());
        return redirect()->route('join.check');
    }

    public function check(Request $request)
    {
        $session_join = $request->session()->get('join');
        return view('join.check', compact('session_join'));
    }

    public function store(Request $request)
    {
        $session_join = $request->session()->get('join');
        $member = new Member;

        $member->name_sei = $session_join['name_sei'];
        $member->name_mei = $session_join['name_mei'];
        $member->nickname = $session_join['nickname'];
        $member->gender = $session_join['gender'];
        $member->password = Hash::make($session_join['password1']);
        $member->email = $session_join['email'];

        $member->save();

        return redirect()->route('join.complete');
    }

    public function complete(Request $request)
    {
        return view('join.complete');
    }
}
