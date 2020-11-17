<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Requests\MemberRequest;

class MemberController extends Controller
{
    //
    public function getIndex(Request $request)
    {
        return view('join.index');
    }

    public function postIndex(MemberRequest $request)
    {
        $form = $request->all();
        return redirect()->route('join.check', $form);
    }

    public function check(Request $request)
    {
        return view('join.check', $form);
    }

    public function store(Request $request)
    {
        $member = new Member;

        $member->name_sei = $form->name_sei;
        $member->name_mei = $form->name_mei;
        $member->nickname = $form->nickname;
        $member->gender = $form->gender;
        $member->password = $form->password1;
        $member->email = $form->email;

        $member->save();

        return redirect('join/complete');
    }
}
