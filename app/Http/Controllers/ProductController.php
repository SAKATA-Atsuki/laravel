<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_category;
use App\Models\Product_subcategory;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function register(Request $request)
    {
        $categories = Product_category::all();
        $subcategories = Product_subcategory::where('product_category_id', old('category'))->get();
        $topOrList = 0;
        return view('product.register', compact('categories', 'subcategories', 'topOrList'));
    }

    public function register2(Request $request)
    {
        $request->session()->forget('product_search');
        $categories = Product_category::all();
        $subcategories = Product_subcategory::where('product_category_id', old('category'))->get();
        $topOrList = 1;
        return view('product.register', compact('categories', 'subcategories', 'topOrList'));
    }

    public function category(Request $request)
    {
        $category_id = $request->category_id;
        $subcategories = Product_subcategory::all();
        $subcategories_list = array();

        if ($category_id == 0) {
            $subcategories_list[0] = '----------------';
        } else {
            foreach ($subcategories as $subcategory) {
                if ($subcategory->product_category_id == $category_id) {
                    $subcategories_list[$subcategory->id] = $subcategory->name;
                }
            }    
        }

        // json形式でregister.blade.phpへバックする
        echo json_encode($subcategories_list);
    }

    public function image1()
    {
        return view('product.image1');
    }

    public function image2()
    {
        return view('product.image2');
    }

    public function image3()
    {
        return view('product.image3');
    }

    public function image4()
    {
        return view('product.image4');
    }

    public function check(ProductRequest $request)
    {
        $product = $request->all();
        $product = $request->except(['product-register-image-upload-1', 'product-register-image-upload-2', 'product-register-image-upload-3', 'product-register-image-upload-4']);
        $request->session()->put('product', $product);
        $category = Product_category::find($request->category);
        $subcategory = Product_subcategory::find($request->subcategory);

        return view('product.check', compact('product', 'category', 'subcategory'));
    }

    public function store(Request $request)
    {
        $session_product = $request->session()->get('product');

        if ($request->has('back')) {
            if ($request->topOrList == 0) {
                return redirect()->route('product.register')->withInput($session_product);
            } else {
                return redirect()->route('product.register2')->withInput($session_product);
            }
        } else {
            $product = new Product;
            $product->member_id = Auth::user()->id;
            $product->product_category_id = $session_product['category'];
            $product->product_subcategory_id = $session_product['subcategory'];
            $product->name = $session_product['name'];
            $product->image_1 = $session_product['product-register-image-1'];
            $product->image_2 = $session_product['product-register-image-2'];
            $product->image_3 = $session_product['product-register-image-3'];
            $product->image_4 = $session_product['product-register-image-4'];
            $product->product_content = $session_product['explanation'];
            $product->save();

            return redirect()->route('top');
        }
    }

    public function list(Request $request)
    {
        if ($request->session()->exists('product_search')) {
            $session_product_search = $request->session()->get('product_search');

            $results = Product::where('product_category_id', $session_product_search['category'])
                                ->where('product_subcategory_id', $session_product_search['subcategory'])
                                ->where('name', 'like', '%' . $session_product_search['word'] . '%')
                                ->where('product_content', 'like', '%' . $session_product_search['word'] . '%')
                                ->simplePaginate(10);
        } else {
            $session_product_search['category'] = 0;
            $session_product_search['subcategory'] = 0;
            $session_product_search['word'] = '';

            $results = Product::simplePaginate(10);
        }

        $categories = Product_category::all();
        $subcategories = Product_subcategory::where('product_category_id', $session_product_search['category'])->get();

        $page = $request->page;
        if ($page == 0) {
            $page = 1;
        }

        $star = array();
        foreach ($results as $result) {
            $reviews = Review::where('product_id', $result->id)->get();

            if (count($reviews)) {
                $evaluation = 0;
                foreach ($reviews as $review) {
                    $evaluation += $review->evaluation;
                }
                $star[$result->id] = ceil($evaluation / count($reviews));
            } else {
                $star[$result->id] = 0;
            }    
        }

        return view('product.list', compact('categories', 'subcategories', 'session_product_search', 'results', 'page', 'star'));
    }

    public function search(Request $request)
    {
        $conditions = $request->all();
        $request->session()->put('product_search', $conditions);

        return redirect()->route('product.list');
    }

    public function detail(Request $request)
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

        return view('product.detail', compact('page', 'product', 'star'));
    }
}
