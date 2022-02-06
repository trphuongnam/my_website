<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Infomation;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProfileInforFormRequest extends FormRequest
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
            'name' => 'required|unique:infomations,name',
            'content' => 'required',
            'status' => 'required'
        ];
    }

    // The function return error with validation failed
    protected function failedValidation(Validator $validator) {
        $errors = $validator->errors();

        $response = response()->json([
            'message' => 'Invalid data send',
            'status' => false,
            'details' => $errors->messages(),
        ], 200);

        throw new HttpResponseException($response);
    }
}
