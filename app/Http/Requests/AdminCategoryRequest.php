<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category' => 'required|max:20',
            'subcategory1' => 'required|max:20',
            'subcategory2' => 'max:20',
            'subcategory3' => 'max:20',
            'subcategory4' => 'max:20',
            'subcategory5' => 'max:20',
            'subcategory6' => 'max:20',
            'subcategory7' => 'max:20',
            'subcategory8' => 'max:20',
            'subcategory9' => 'max:20',
            'subcategory10' => 'max:20'
        ];
    }

    public function messages()
    {
        return [
            'category.required' => '　　　　　　　　　　　　　※商品大カテゴリは必須入力です',
            'category.max' => '　　　　　　　　　　　　　※商品大カテゴリは２０文字以内で入力してください',
            'subcategory1.required' => '　　　　　　　　　　　　　※商品小カテゴリは１つ以上入力してください',
            'subcategory1.max' => '　　　　　　　　　　　　　※商品小カテゴリは２０文字以内で入力してください',
            'subcategory2.max' => '　　　　　　　　　　　　　※商品小カテゴリは２０文字以内で入力してください',
            'subcategory3.max' => '　　　　　　　　　　　　　※商品小カテゴリは２０文字以内で入力してください',
            'subcategory4.max' => '　　　　　　　　　　　　　※商品小カテゴリは２０文字以内で入力してください',
            'subcategory5.max' => '　　　　　　　　　　　　　※商品小カテゴリは２０文字以内で入力してください',
            'subcategory6.max' => '　　　　　　　　　　　　　※商品小カテゴリは２０文字以内で入力してください',
            'subcategory7.max' => '　　　　　　　　　　　　　※商品小カテゴリは２０文字以内で入力してください',
            'subcategory8.max' => '　　　　　　　　　　　　　※商品小カテゴリは２０文字以内で入力してください',
            'subcategory9.max' => '　　　　　　　　　　　　　※商品小カテゴリは２０文字以内で入力してください',
            'subcategory10.max' => '　　　　　　　　　　　　　※商品小カテゴリは２０文字以内で入力してください'
        ];
    }
}
