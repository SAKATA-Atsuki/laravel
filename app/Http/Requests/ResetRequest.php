<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Hankaku;

class ResetRequest extends FormRequest
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
            'token' => 'required',
            'password' => ['required', new Hankaku, 'min:8', 'max:20'],
            'password_confirmation' => ['required', new Hankaku, 'min:8', 'max:20', 'same:password']
        ];
    }

    public function messages()
    {
        return [
            'password.required' => '　　　　　※パスワードは必須入力です',
            'password.min' => '　　　　　※パスワードは８〜２０文字で入力してください',
            'password.max' => '　　　　　※パスワードは８〜２０文字で入力してください',
            'password_confirmation.required' => '　　　　　※パスワード確認は必須入力です',
            'password_confirmation.min' => '　　　　　※パスワード確認は８〜２０文字で入力してください',
            'password_confirmation.max' => '　　　　　※パスワード確認は８〜２０文字で入力してください',
            'password_confirmation.same' => '　　　　　※入力した文字が「パスワード」と一致しません'
        ];
    }
}
