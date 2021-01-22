<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MemberRequest;
use App\Http\Requests\AdminMemberEditRequest;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class AdminMemberController extends Controller
{
    public function memberIndex(Request $request)
    {
        $data = $request->all();

        if (isset($data['id'])) {
        } else {
            $data['id'] = '';
        }
        if (isset($data['gender'])) {
        } else {
            $data['gender'] = '';
        }
        if (isset($data['free'])) {
        } else {
            $data['free'] = '';
        }


        if ($request->order) {
            $order = $request->order;
        } else {
            $order = 1;
        }

        if ($order == 1) {
            $members = Member::where('id', 'like', '%' . $request->id . '%')
                                ->where('gender', 'like', '%' . $request->gender . '%')
                                ->where(function($query) use($request) {
                                    $query->where('name_sei', 'like', '%' . $request->free . '%')
                                            ->orWhere('name_mei', 'like', '%' . $request->free . '%')
                                            ->orWhere('email', 'like', '%' . $request->free . '%');
                                })
                                ->simplePaginate(10);
        } else {
            $members = Member::where('id', 'like', '%' . $request->id . '%')
                                ->where('gender', 'like', '%' . $request->gender . '%')
                                ->where(function($query) use($request) {
                                    $query->where('name_sei', 'like', '%' . $request->free . '%')
                                            ->orWhere('name_mei', 'like', '%' . $request->free . '%')
                                            ->orWhere('email', 'like', '%' . $request->free . '%');
                                })
                                ->orderBy('id', 'desc')
                                ->simplePaginate(10);
        }

        if ($request->page) {
            $page = $request->page;
        } else {
            $page = 1;
        }

        return view('admin.member.index', compact('data', 'order', 'members', 'page'));
    }

    public function getMemberRegister()
    {
        return view('admin.member.register');
    }

    public function postMemberRegister(MemberRequest $request)
    {
        $request->session()->put('register', $request->all());
        return redirect()->route('admin.member.register.check');
    }

    public function memberRegisterCheck(Request $request)
    {
        $session_register = $request->session()->get('register');
        return view('admin.member.check', compact('session_register'));
    }

    public function memberRegisterStore(Request $request)
    {
        $session_register = $request->session()->get('register');

        event(new Registered($user = $this->memberRegisterCreate($session_register))); // DBに保存

        return redirect()->route('admin.member');
    }

    protected function memberRegisterCreate(array $data)
    {
        return Member::create([
            'name_sei' => $data['name_sei'],
            'name_mei' => $data['name_mei'],
            'nickname' => $data['nickname'],
            'gender' => $data['gender'],
            'password' => Hash::make($data['password1']),
            'email' => $data['email']    
        ]);
    }

    public function getMemberEdit(Request $request)
    {
        $member = Member::find($request->id);

        return view('admin.member.edit', compact('member'));
    }

    public function postMemberEdit(AdminMemberEditRequest $request)
    {
        $request->session()->put('edit', $request->all());
        return redirect()->route('admin.member.edit.check');
    }

    public function memberEditCheck(Request $request)
    {
        $session_edit = $request->session()->get('edit');
        return view('admin.member.checkEdit', compact('session_edit'));
    }

    public function memberEditStore(Request $request)
    {
        $session_edit = $request->session()->get('edit');

        $member = Member::find($session_edit['id']);
        $member->name_sei = $session_edit['name_sei'];
        $member->name_mei = $session_edit['name_mei'];
        $member->nickname = $session_edit['nickname'];
        $member->gender = $session_edit['gender'];
        if ($session_edit['password1'] != '') {
            $member->password = Hash::make($session_edit['password1']);
        }
        $member->email = $session_edit['email'];
        $member->save();

        return redirect()->route('admin.member');
    }

    public function memberDetail(Request $request)
    {
        $member = Member::find($request->id);

        return view('admin.member.detail', compact('member'));
    }

    public function memberDetailDelete(Request $request)
    {
        Member::find($request->id)->delete();

        return redirect()->route('admin.member');
    }
}
