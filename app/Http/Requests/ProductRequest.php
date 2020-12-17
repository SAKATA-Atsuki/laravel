<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            //
            'name' => 'required|max:100',
            'category' => 'integer|gt:0',
            'explanation' => 'required|max:500'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '　　　　　　　　　　　　　　※商品名は必須入力です',
            'name.max' => '　　　　　　　　　　　　　　※商品名は１００文字以内で入力してください',
            'category.gt' => '　　　　　　　　　　　　　　※商品カテゴリは選択必須です',
            'explanation.required' => '　　　　　　　　　　　　　　※商品説明は必須入力です',
            'explanation.max' => '　　　　　　　　　　　　　　※商品説明は５００文字以内で入力してください'
        ];
    }
}
