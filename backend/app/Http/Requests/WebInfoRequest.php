<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebInfoRequest extends FormRequest
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
            'website_name' => 'required',
            'website_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'website_name.required' => 'Tên Website Không Được Để Trống',
            'website_description.required' => 'Mô Tả Website Không Được Để Trống',
        ];
    }
}
