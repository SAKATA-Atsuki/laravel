<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberEditInformationRequest extends FormRequest
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
            'name_sei' => 'required|max:20',
            'name_mei' => 'required|max:20',
            'nickname' => 'required|max:10',
            'gender' => 'required'
        ];
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
            'gender.required' => '　　　　　※性別は選択必須です'
        ];
    }
}
