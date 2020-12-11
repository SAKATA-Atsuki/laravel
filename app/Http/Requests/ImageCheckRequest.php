<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageCheckRequest extends FormRequest
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
            'product-register-image-upload-1' => 'image|max:10240|mimes:jpg,jpeg,png,gif'
        ];
    }

    public function messages()
    {
        return [
            'product-register-image-upload-1.image' => '画像ファイルをアップロードしてください。',
            'product-register-image-upload-1.max' => '10MB以下の画像をアップロードしてください。',
            'product-register-image-upload-1.mimes' => 'jpg, jpeg, png, gifのいずれかの画像ファルをアップロードしてください。'
        ];
    }
}
