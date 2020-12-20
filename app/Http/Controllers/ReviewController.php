<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function register(Request $request)
    {
        $page = $request->page;
        $product = Product::find($request->id);
        $reviews = Review::where('product_id', $request->id)->get();

        if (count($reviews)) {
            $evaluation = 0;
            foreach ($reviews as $review) {
                $evaluation += $review->evaluation;
            }
            $star = ceil($evaluation / count($reviews));
        } else {
            $star = 0;
        }

        return view('review.register', compact('page', 'product', 'star'));
    }

    public function check(ReviewRequest $request)
    {
        $data = $request->all();
        $product = Product::find($data['product_id']);

        return view('review.check', compact('data', 'product'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->has('back')) {
            return redirect()->route('review.register', ['page' => $data['page'], 'id' => $data['product_id']])->withInput($data);
        } else {
            $review = new Review;
            $review->member_id = Auth::user()->id;
            $review->product_id = $data['product_id'];
            $review->evaluation = $data['evaluation'];
            $review->comment = $data['comment'];
            $review->save();

            return redirect()->route('review.complete', ['page' => $data['page'], 'id' => $data['product_id']]);
        }
    }

    public function complete(Request $request)
    {
        $data = $request->all();
        return view('review.complete', compact('data'));
    }

    public function list(Request $request)
    {
        $pg = $request->pg;
        $product = Product::find($request->id);
        $reviews = Review::where('product_id', $request->id)->get();

        if (count($reviews)) {
            $evaluation = 0;
            foreach ($reviews as $review) {
                $evaluation += $review->evaluation;
            }
            $star = ceil($evaluation / count($reviews));
        } else {
            $star = 0;
        }

        $results = Review::where('product_id', $request->id)->simplePaginate(5);

        return view('review.list', compact('pg', 'product', 'star', 'results'));
    }
}
