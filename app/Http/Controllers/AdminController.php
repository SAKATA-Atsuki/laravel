<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.index');
    }

    public function member(Request $request)
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
                                ->where('nickname', 'like', '%' . $request->free . '%')
                                ->simplePaginate(10);
        } else {
            $members = Member::where('id', 'like', '%' . $request->id . '%')
                                ->where('gender', 'like', '%' . $request->gender . '%')
                                ->where('nickname', 'like', '%' . $request->free . '%')
                                ->orderBy('id', 'desc')
                                ->simplePaginate(10);
        }

        if ($request->page) {
            $page = $request->page;
        } else {
            $page = 1;
        }

        return view('admin.member', compact('data', 'order', 'members', 'page'));
    }
}
