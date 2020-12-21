<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberEditEmailRequest extends FormRequest
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
            'email' => 'required|max:200|email|unique:members'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '※メールアドレスは必須入力です',
            'email.max' => "※メールアドレスは２００文字以内で入力してください",
            'email.email' => '※メールアドレスは正しい形式で入力してください',
            'email.unique' => '※このメールアドレスは既に登録されています'
        ];
    }
}
