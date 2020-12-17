<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_category;
use App\Models\Product_subcategory;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function register()
    {
        $categories = Product_category::all();
        $subcategories = Product_subcategory::all();
        return view('product.register', ['categories' => $categories, 'subcategories' => $subcategories]);
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
        return view('product.check', compact('product'));
    }

    public function store(Request $request)
    {
        $session_product = $request->session()->get('product');

        if ($request->has('back')) {
            return redirect()->route('product.register')->withInput($session_product);
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
}
