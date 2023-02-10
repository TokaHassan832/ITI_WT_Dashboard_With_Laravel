<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id'=>'required|unique:students|integer',
            'name'=>'required|max:50|alpha',
            'email'=>'required|unique:students|max:255|email',
            'phone'=>'required|digits:11|unique:students',
            'department'=>'integer|max:255|min:1',
            'image'=>'image|mimes:png,jpg'
        ];
    }
}
