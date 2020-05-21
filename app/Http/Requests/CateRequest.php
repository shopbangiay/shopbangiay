<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateRequest extends FormRequest
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
            'txtCateName' =>'required|unique:category_product, category_name',
            'txtDescription' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'txtCateName.required' => 'Vui lòng tên danh mục không để trống',
            'txtDescription.required' => 'Vui lòng mô tả không để trống',
            'txtCateName.unique' => 'Tên danh mục đã tồn tại'
        ];
    }
}
