<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminCategoryRequest;
use App\Models\Product_category;
use App\Models\Product_subcategory;

class AdminCategoryController extends Controller
{
    // 商品カテゴリ一覧
    public function categoryIndex(Request $request)
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
            $categories = Product_category::where('id', 'like', '%' . $request->id . '%')
                                            ->where(function($query) use($request) {
                                                $query->where('name', 'like', '%' . $request->free . '%')
                                                        ->orWhereHas('subcategories', function($query) use($request) {
                                                            $query->where('name', 'like', '%' . $request->free . '%');
                                                        });
                                            })
                                            ->simplePaginate(10);
        } else {
            $categories = Product_category::where('id', 'like', '%' . $request->id . '%')
                                            ->where(function($query) use($request) {
                                                $query->where('name', 'like', '%' . $request->free . '%')
                                                        ->orWhereHas('subcategories', function($query) use($request) {
                                                            $query->where('name', 'like', '%' . $request->free . '%');
                                                        });
                                            })
                                            ->orderBy('id', 'desc')
                                            ->simplePaginate(10);
        }

        if ($request->page) {
            $page = $request->page;
        } else {
            $page = 1;
        }

        return view('admin.category.index', compact('data', 'order', 'categories', 'page'));
    }

    // 商品カテゴリ登録（get）
    public function getCategoryRegister()
    {
        return view('admin.category.register');
    }

    // 商品カテゴリ登録（post）
    public function postCategoryRegister(AdminCategoryRequest $request)
    {
        $request->session()->put('category_register', $request->all());
        return redirect()->route('admin.category.register.check');
    }

    // 商品カテゴリ登録確認
    public function categoryRegisterCheck(Request $request)
    {
        $session_category_register = $request->session()->get('category_register');
        return view('admin.category.check', compact('session_category_register'));
    }

    // 商品カテゴリ登録保存
    public function categoryRegisterStore(Request $request)
    {
        $session_category_register = $request->session()->get('category_register');

        $category = new Product_category;
        $category->name = $session_category_register['category'];
        $category->save();

        $category = Product_category::where('name', $session_category_register['category'])->first();

        for ($i = 1; $i <= 10; $i++) {
            if ($session_category_register['subcategory' . $i] != '') {
                $subcategory = new Product_subcategory;
                $subcategory->product_category_id = $category->id;
                $subcategory->name = $session_category_register['subcategory' . $i];
                $subcategory->save();    
            }
        }

        return redirect()->route('admin.category');
    }

    // 商品カテゴリ編集（get）
    public function getCategoryEdit(Request $request)
    {
        $category = Product_category::find($request->id);
        $subcategories = Product_subcategory::where('product_category_id', $category->id)->get();

        return view('admin.category.edit', compact('category', 'subcategories'));
    }

    // 商品カテゴリ編集（post）
    public function postCategoryEdit(AdminCategoryRequest $request)
    {
        $request->session()->put('category_edit', $request->all());
        return redirect()->route('admin.category.edit.check');
    }

    // 商品カテゴリ編集確認
    public function categoryEditCheck(Request $request)
    {
        $session_category_edit = $request->session()->get('category_edit');
        return view('admin.category.checkEdit', compact('session_category_edit'));
    }

    // 商品カテゴリ編集保存
    public function categoryEditStore(Request $request)
    {
        $session_category_edit = $request->session()->get('category_edit');

        $category = Product_category::find($session_category_edit['id']);
        $category->name = $session_category_edit['category'];
        $category->save();

        Product_subcategory::where('product_category_id', $session_category_edit['id'])->forceDelete();

        for ($i = 1; $i <= 10; $i++) {
            if ($session_category_edit['subcategory' . $i] != '') {
                $subcategory = new Product_subcategory;
                $subcategory->product_category_id = $category->id;
                $subcategory->name = $session_category_edit['subcategory' . $i];
                $subcategory->save();    
            }
        }

        return redirect()->route('admin.category');
    }

    // 商品カテゴリ詳細
    public function categoryDetail(Request $request)
    {
        $category = Product_category::find($request->id);
        $subcategories = Product_subcategory::where('product_category_id', $category->id)->get();

        return view('admin.category.detail', compact('category', 'subcategories'));
    }

    // 商品カテゴリ削除
    public function categoryDetailDelete(Request $request)
    {
        Product_category::find($request->id)->delete();
        Product_subcategory::where('product_category_id', $request->id)->delete();

        return redirect()->route('admin.category');
    }
}
