<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\Product_subcategory;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class AdminProductController extends Controller
{
    // 商品一覧
    public function productIndex(Request $request)
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
            $products = Product::where('id', 'like', '%' . $request->id . '%')
                                ->where(function($query) use($request) {
                                    $query->where('name', 'like', '%' . $request->free . '%')
                                            ->orWhere('product_content', 'like', '%' . $request->free . '%');
                                })
                                ->simplePaginate(10);
        } else {
            $products = Product::where('id', 'like', '%' . $request->id . '%')
                                ->where(function($query) use($request) {
                                    $query->where('name', 'like', '%' . $request->free . '%')
                                            ->orWhere('product_content', 'like', '%' . $request->free . '%');
                                })
                                ->orderBy('id', 'desc')
                                ->simplePaginate(10);
        }

        if ($request->page) {
            $page = $request->page;
        } else {
            $page = 1;
        }

        return view('admin.product.index', compact('data', 'order', 'products', 'page'));
    }

    // 商品登録（get）
    public function getProductRegister()
    {
        $categories = Product_category::all();
        $subcategories = Product_subcategory::where('product_category_id', old('category'))->get();

        return view('admin.product.register', compact('categories', 'subcategories'));
    }

    // 商品登録（post）
    public function postProductRegister(ProductRequest $request)
    {
        $product = $request->all();
        $product = $request->except(['product-register-image-upload-1', 'product-register-image-upload-2', 'product-register-image-upload-3', 'product-register-image-upload-4']);
        $request->session()->put('product_register', $product);
        return redirect()->route('admin.product.register.check');
    }

    // 商品登録確認
    public function productRegisterCheck(Request $request)
    {
        $session_product_register = $request->session()->get('product_register');
        $category = Product_category::find($session_product_register['category']);
        $subcategory = Product_subcategory::find($session_product_register['subcategory']);

        return view('admin.product.check', compact('session_product_register', 'category', 'subcategory'));
    }

    // 商品登録保存
    public function productRegisterStore(Request $request)
    {
        $session_product_register = $request->session()->get('product_register');

        $product = new Product;
        $product->member_id = Auth::guard('administer')->user()->id;
        $product->product_category_id = $session_product_register['category'];
        $product->product_subcategory_id = $session_product_register['subcategory'];
        $product->name = $session_product_register['name'];
        $product->image_1 = $session_product_register['product-register-image-1'];
        $product->image_2 = $session_product_register['product-register-image-2'];
        $product->image_3 = $session_product_register['product-register-image-3'];
        $product->image_4 = $session_product_register['product-register-image-4'];
        $product->product_content = $session_product_register['explanation'];
        $product->save();

        return redirect()->route('admin.product');
    }

    // 商品編集（get）
    public function getProductEdit(Request $request)
    {
        $product = Product::find($request->id);
        $categories = Product_category::all();
        if (null !== old('category')) {
            $subcategories = Product_subcategory::where('product_category_id', old('category'))->get();
        } else {
            $subcategories = Product_subcategory::where('product_category_id', $product->product_category_id)->get();
        }

        return view('admin.product.edit', compact('product', 'categories', 'subcategories'));
    }

    // 商品編集（post）
    public function postProductEdit(ProductRequest $request)
    {
        $product = $request->all();
        $product = $request->except(['product-register-image-upload-1', 'product-register-image-upload-2', 'product-register-image-upload-3', 'product-register-image-upload-4']);
        $request->session()->put('product_edit', $product);
        return redirect()->route('admin.product.edit.check');
    }

    // 商品編集確認
    public function productEditCheck(Request $request)
    {
        $session_product_edit = $request->session()->get('product_edit');
        $category = Product_category::find($session_product_edit['category']);
        $subcategory = Product_subcategory::find($session_product_edit['subcategory']);

        return view('admin.product.checkEdit', compact('session_product_edit', 'category', 'subcategory'));
    }

    // 商品編集保存
    public function productEditStore(Request $request)
    {
        $session_product_edit = $request->session()->get('product_edit');

        $product = Product::find($session_product_edit['id']);
        $product->member_id = Auth::guard('administer')->user()->id;
        $product->product_category_id = $session_product_edit['category'];
        $product->product_subcategory_id = $session_product_edit['subcategory'];
        $product->name = $session_product_edit['name'];
        $product->image_1 = $session_product_edit['product-register-image-1'];
        $product->image_2 = $session_product_edit['product-register-image-2'];
        $product->image_3 = $session_product_edit['product-register-image-3'];
        $product->image_4 = $session_product_edit['product-register-image-4'];
        $product->product_content = $session_product_edit['explanation'];
        $product->save();

        return redirect()->route('admin.product');
    }

    // 商品詳細
    public function productDetail(Request $request)
    {
        $product = Product::find($request->id);
        $category = Product_category::find($product->product_category_id);
        $subcategory = Product_subcategory::find($product->product_subcategory_id);
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

        $reviews = Review::where('product_id', $product->id)->simplePaginate(3);

        return view('admin.product.detail', compact('product', 'category', 'subcategory', 'reviews', 'star'));
    }

    // 商品削除
    public function productDetailDelete(Request $request)
    {
        Product::find($request->id)->delete();

        return redirect()->route('admin.product');
    }
}
