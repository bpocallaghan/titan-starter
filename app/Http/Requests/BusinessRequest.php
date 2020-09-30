<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class BusinessRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:245',
            'email' => 'nullable|min:3|max:245',
            'telephone' => 'nullable|min:3|max:245',
            'photo' => 'nullable|image|max:6000|mimes:jpg,jpeg,png,bmp',
        ];
    }
}
