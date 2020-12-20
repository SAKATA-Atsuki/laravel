<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'evaluation' => 'required|min:1|max:5',
            'comment' => 'required|max:500'
        ];
    }

    public function messages()
    {
        return [
            'evaluation.required' => '　　　　　　　　　　　　※商品評価は選択必須です',
            'evaluation.min' => '　　　　　　　　　　　　※商品評価は1〜5の中から入力してください',
            'evaluation.max' => '　　　　　　　　　　　　※商品評価は1〜5の中から入力してください',
            'comment.required' => '　　　　　　　　　　　　※商品コメントは必須入力です',
            'comment.max' => '　　　　　　　　　　　　※商品コメントは５００文字以内で入力してください'
        ];
    }
}
