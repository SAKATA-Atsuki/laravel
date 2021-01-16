<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Hankaku2;
use App\Rules\Hankaku3;

class AdministerRequest extends FormRequest
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
            'login_id' => ['required', new Hankaku3, 'min:7', 'max:10'],
            'password' => ['required', new Hankaku2, 'min:8', 'max:20']
        ];
    }

    public function messages()
    {
        return [
            'login_id.required' => '※IDは必須入力です',
            'login_id.min' => '※IDは７〜１０文字で入力してください',
            'login_id.max' => '※IDは７〜１０文字で入力してください',
            'password.required' => '※パスワードは必須入力です',
            'password.min' => '※パスワードは８〜２０文字で入力してください',
            'password.max' => '※パスワードは８〜２０文字で入力してください',
        ];
    }
}
