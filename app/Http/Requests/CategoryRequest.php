<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|regex:/^[A-Za-z ]+$/',
            'image' => 'required|nullable|image|mimes:jpg,jpeg,png'
        ];
    }

    public function messages(){
        return[
            'name.required' => 'Please enter your name.',
            'name.string' => 'Name must be valid text.',
            'name.regex' => 'Name can only contain letters and spaces.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'Image must be a file of type: JPG, JPEG, or PNG.',
        ];
    }
}
