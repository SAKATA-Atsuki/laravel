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

    public function fetch(Request $request)
    {
        $category_id = $request->get('category_id');
        $subcategories = Product_subcategory::all();
        
        $subcategories_list = array();
        foreach ($subcategories as $subcategory) {
            if ($subcategory->product_category_id == $category_id) {
                $subcategories_list[$subcategory->id] = $subcategory->name;
            }
        }

        //json形式でregister.blade.phpへバックする
        echo json_encode($subcategories_list);

        $category_id = $request->get('category_id');
        $subcategories = Product_subcategory::all();
        
        $subcategories_list = array();
        foreach ($subcategories as $subcategory) {
            if ($subcategory->product_category_id == $category_id) {
                $subcategories_list[$subcategory->id] = $subcategory->name;
            }
        }

        echo $subcategories_list;
    }

    public function check()
    {

    }
}
