<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_category;
use App\Models\Product_subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function register()
    {
        $categories = Product_category::all();
        return view('product.register', ['categories' => $categories]);
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

    public function image(Request $request)
    {
        $name = time() . $request->url;
        $request->url->move(public_path('images'), $name);

        // json形式でregister.blade.phpへバックする
        echo json_encode($name);
    }

    public function check()
    {

    }
}
