<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\MemberEditInformationRequest;
use App\Http\Requests\MemberEditPasswordRequest;
use App\Http\Requests\MemberEditEmailRequest;
use App\Http\Requests\MemberEditEmailCodeRequest;
use App\Http\Requests\ReviewEditRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailEditNotification;

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

    public function informationCheck(MemberEditInformationRequest $request)
    {
        $data = $request->all();
        return view('mypage.edit.check', compact('data'));
    }

    public function informationStore(Request $request)
    {
        $data = $request->all();

        if ($request->has('back')) {
            return redirect()->route('mypage.edit.information')->withInput($data);
        } else {
            $member = Auth::user();
            $member->name_sei = $data['name_sei'];
            $member->name_mei = $data['name_mei'];
            $member->nickname = $data['nickname'];
            $member->gender = $data['gender'];
            $member->save();

            return redirect()->route('mypage');
        }
    }

    public function password(Request $request)
    {
        return view('mypage.edit.password');
    }

    public function passwordStore(MemberEditPasswordRequest $request)
    {
        $data = $request->all();

        $member = Auth::user();
        $member->password = Hash::make($data['password1']);
        $member->save();

        return redirect()->route('mypage');
    }

    public function email(Request $request)
    {
        return view('mypage.edit.email');
    }

    public function emailAuth(MemberEditEmailRequest $request)
    {
        $data = $request->all();
        $request->session()->put('email', $data['email']);

        $code = (int) str_pad(mt_Rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $members = Member::where('auth_code', $code)->get();
        while (count($members) != 0) {
            $code = (int) str_pad(mt_Rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $members = Member::where('auth_code', $code)->get();
        }

        Mail::to($data['email'])->send(new EmailEditNotification($code));

        $member = Auth::user();
        $member->auth_code = $code;
        $member->save();

        return view('mypage.edit.auth');
    }

    public function emailAuth2(Request $request)
    {
        $data = $request->all();
        return view('mypage.edit.auth');
    }

    public function emailStore(MemberEditEmailCodeRequest $request)
    {
        $session_email = $request->session()->get('email');

        $member = Auth::user();
        $member->email = $session_email;
        $member->save();

        $request->session()->forget('email');

        return redirect()->route('mypage');
    }

    public function reviewList(Request $request)
    {
        $reviews = Review::where('member_id', Auth::user()->id)->simplePaginate(5);

        $page = $request->page;
        if ($page == 0) {
            $page = 1;
        }

        return view('mypage.review.list', compact('reviews', 'page'));
    }

    public function reviewEdit(Request $request)
    {
        $page = $request->page;
        $product = Product::find($request->product_id);
        $reviews = Review::where('product_id', $request->product_id)->get();

        if (count($reviews)) {
            $evaluation = 0;
            foreach ($reviews as $review) {
                $evaluation += $review->evaluation;
            }
            $star = ceil($evaluation / count($reviews));
        } else {
            $star = 0;
        }

        $review = Review::find($request->review_id);

        return view('mypage.review.edit', compact('page', 'product', 'star', 'review'));
    }

    public function reviewCheck(ReviewEditRequest $request)
    {
        $data = $request->all();
        $product = Product::find($data['product_id']);

        return view('mypage.review.check', compact('data', 'product'));
    }

    public function reviewStore(Request $request)
    {
        $data = $request->all();

        if ($request->has('back')) {
            return redirect()->route('mypage.review.edit', ['page' => $data['page'], 'review_id' => $data['review_id'], 'product_id' => $data['product_id']])->withInput($data);
        } else {
            $review = Review::find($data['review_id']);
            $review->evaluation = $data['evaluation'];
            $review->comment = $data['comment'];
            $review->save();

            return redirect()->route('mypage.review.list');
        }
    }

    public function reviewDeleteCheck(Request $request)
    {
        $page = $request->page;
        $product = Product::find($request->product_id);
        $reviews = Review::where('product_id', $request->product_id)->get();

        if (count($reviews)) {
            $evaluation = 0;
            foreach ($reviews as $review) {
                $evaluation += $review->evaluation;
            }
            $star = ceil($evaluation / count($reviews));
        } else {
            $star = 0;
        }

        $review = Review::find($request->review_id);

        return view('mypage.review.delete', compact('page', 'product', 'star', 'review'));
    }

    public function reviewDelete(Request $request)
    {
        $data = $request->all();

        if ($request->has('back')) {
            return redirect()->route('mypage.review.list', ['page' => $data['page']]);
        } else {
            $review = Review::find($data['review_id']);
            $review->delete();

            return redirect()->route('mypage.review.list');
        }
    }
}
