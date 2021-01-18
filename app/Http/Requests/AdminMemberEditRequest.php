<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Hankaku;
use Illuminate\Validation\Rule;

class AdminMemberEditRequest extends FormRequest
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
        if ($this->password1 == '') {
            return [
                'name_sei' => 'required|max:20',
                'name_mei' => 'required|max:20',
                'nickname' => 'required|max:10',
                'gender' => 'required',
                'email' => ['required', 'max:200', 'email', Rule::unique('members')->ignore($this->id)]
            ];    
        } else {
            return [
                'name_sei' => 'required|max:20',
                'name_mei' => 'required|max:20',
                'nickname' => 'required|max:10',
                'gender' => 'required',
                'password1' => [new Hankaku, 'min:8', 'max:20'],
                'password2' => [new Hankaku, 'min:8', 'max:20', 'same:password1'],
                'email' => ['required', 'max:200', 'email', Rule::unique('members')->ignore($this->id)]
            ];    
        }
    }

    public function messages()
    {
        return [
            'name_sei.required' => '　　　　　※氏名（姓）は必須入力です',
            'name_sei.max' => '　　　　　※氏名（姓）は２０文字以内で入力してください',
            'name_mei.required' => '　　　　　※氏名（名）は必須入力です',
            'name_mei.max' => '　　　　　※氏名（名）は２０文字以内で入力してください',
            'nickname.required' => '　　　　　※ニックネームは必須入力です',
            'nickname.max' => '　　　　　※ニックネームは１０文字以内で入力してください',
            'gender.required' => '　　　　　※性別は選択必須です',
            'password1.min' => '　　　　　※パスワードは８〜２０文字で入力してください',
            'password1.max' => '　　　　　※パスワードは８〜２０文字で入力してください',
            'password2.min' => '　　　　　※パスワード確認は８〜２０文字で入力してください',
            'password2.max' => '　　　　　※パスワード確認は８〜２０文字で入力してください',
            'password2.same' => '　　　　　※入力した文字が「パスワード」と一致しません',
            'email.required' => '　　　　　※メールアドレスは必須入力です',
            'email.max' => "　　　　　※メールアドレスは\n　　　　　　２００文字以内で入力してください",
            'email.email' => '　　　　　※メールアドレスは正しい形式で入力してください',
            'email.unique' => '　　　　　※このメールアドレスは既に登録されています'
        ];
    }
}
