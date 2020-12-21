<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Hankaku2;

class MemberEditPasswordRequest extends FormRequest
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
            'password1' => ['required', new Hankaku2, 'min:8', 'max:20'],
            'password2' => ['required', new Hankaku2, 'min:8', 'max:20', 'same:password1']
        ];
    }

    public function messages()
    {
        return [
            'password1.required' => '※パスワードは必須入力です',
            'password1.min' => '※パスワードは８〜２０文字で入力してください',
            'password1.max' => '※パスワードは８〜２０文字で入力してください',
            'password2.required' => '※パスワード確認は必須入力です',
            'password2.min' => '※パスワード確認は８〜２０文字で入力してください',
            'password2.max' => '※パスワード確認は８〜２０文字で入力してください',
            'password2.same' => '※入力した文字が「パスワード」と一致しません'
        ];
    }
}
