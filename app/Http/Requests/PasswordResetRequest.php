<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'password/email')
        {
            return true;
        } else {
            return false;
        }
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
            'email' => 'required|exists:members'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '※メールアドレスは必須入力です',
            'email.exists' => '※このメールアドレスは登録されていません'
        ];
    }
}
