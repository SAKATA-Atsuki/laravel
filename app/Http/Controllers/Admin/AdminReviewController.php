<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class AdminReviewController extends Controller
{
    // 商品レビュー一覧
    public function reviewIndex(Request $request)
    {
        $data = $request->all();

        if (isset($data['id'])) {
        } else {
            $data['id'] = '';
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
            $reviews = Review::where('id', 'like', '%' . $request->id . '%')
                                ->where('comment', 'like', '%' . $request->free . '%')
                                ->simplePaginate(10);
        } else {
            $reviews = Review::where('id', 'like', '%' . $request->id . '%')
                                ->where('comment', 'like', '%' . $request->free . '%')
                                ->orderBy('id', 'desc')
                                ->simplePaginate(10);
        }

        if ($request->page) {
            $page = $request->page;
        } else {
            $page = 1;
        }

        return view('admin.review.index', compact('data', 'order', 'reviews', 'page'));
    }

    // 商品レビュー登録（get）
    public function getReviewRegister()
    {
        $products = Product::all();

        return view('admin.review.register', compact('products'));
    }

    // 商品レビュー登録（post）
    public function postReviewRegister(ReviewRequest $request)
    {
        $request->session()->put('review_register', $request->all());
        return redirect()->route('admin.review.register.check');
    }

    // 商品レビュー登録確認
    public function reviewRegisterCheck(Request $request)
    {
        $session_review_register = $request->session()->get('review_register');
        $product = Product::find($session_review_register['product_id']);
        $reviews = Review::where('product_id', $product->id)->get();

        if (count($reviews)) {
            $evaluation = 0;
            foreach ($reviews as $review) {
                $evaluation += $review->evaluation;
            }
            $star = ceil($evaluation / count($reviews));
        } else {
            $star = 0;
        }

        return view('admin.review.check', compact('session_review_register', 'product', 'star'));
    }

    // 商品レビュー登録保存
    public function reviewRegisterStore(Request $request)
    {
        $session_review_register = $request->session()->get('review_register');

        if ($request->has('back')) {
            return redirect()->route('admin.review.register')->withInput($session_review_register);
        } else {
            $review = new Review;
            $review->member_id = Auth::guard('administer')->user()->id;
            $review->product_id = $session_review_register['product_id'];
            $review->evaluation = $session_review_register['evaluation'];
            $review->comment = $session_review_register['comment'];
            $review->save();

            return redirect()->route('admin.review');
        }
    }

    // 商品レビュー編集（get）
    public function getReviewEdit(Request $request)
    {
        $review = Review::find($request->id);
        $product = Product::find($review->product_id);
        $reviews = Review::where('product_id', $product->id)->get();

        if (count($reviews)) {
            $evaluation = 0;
            foreach ($reviews as $review) {
                $evaluation += $review->evaluation;
            }
            $star = ceil($evaluation / count($reviews));
        } else {
            $star = 0;
        }

        $review = Review::find($request->id);

        return view('admin.review.edit', compact('review', 'product', 'star'));
    }

    // 商品レビュー編集（post）
    public function postReviewEdit(ReviewRequest $request)
    {
        $request->session()->put('review_edit', $request->all());
        return redirect()->route('admin.review.edit.check');
    }

    // 商品レビュー編集確認
    public function reviewEditCheck(Request $request)
    {
        $session_review_edit = $request->session()->get('review_edit');
        $review = Review::find($session_review_edit['id']);
        $product = Product::find($review->product_id);

        return view('admin.review.checkEdit', compact('session_review_edit', 'review', 'product'));
    }

    // 商品レビュー編集保存
    public function reviewEditStore(Request $request)
    {
        $session_review_edit = $request->session()->get('review_edit');

        if ($request->has('back')) {
            return redirect()->route('admin.review.edit', ['id' => $session_review_edit['id']])->withInput($session_review_edit);
        } else {
            $review = Review::find($session_review_edit['id']);
            $review->evaluation = $session_review_edit['evaluation'];
            $review->comment = $session_review_edit['comment'];
            $review->save();

            return redirect()->route('admin.review');
        }
    }

    // 商品レビュー詳細
    public function reviewDetail(Request $request)
    {
        $review = Review::find($request->id);
        $product = Product::find($review->product_id);
        $reviews = Review::where('product_id', $product->id)->get();

        if (count($reviews)) {
            $evaluation = 0;
            foreach ($reviews as $review) {
                $evaluation += $review->evaluation;
            }
            $star = ceil($evaluation / count($reviews));
        } else {
            $star = 0;
        }

        $review = Review::find($request->id);

        return view('admin.review.detail', compact('review', 'product', 'star'));
    }

    // 商品レビュー削除
    public function reviewDetailDelete(Request $request)
    {
        Review::find($request->id)->delete();

        return redirect()->route('admin.review');
    }    
}
