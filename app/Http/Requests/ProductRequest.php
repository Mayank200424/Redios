<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required|max:500'
        ];
    }

    public function messages(){
        return [
                'name.required' => 'Product name is required.',
                'name.string' => 'Product name must be a valid text.',
                'name.max' => 'Product name must not exceed 255 characters.',
                'category_id.required' => 'Please select a category.',
                'category_id.exists' => 'Selected category is invalid.',
                'image.required' => 'Product image is required.',
                'image.image' => 'File must be an image.',
                'image.mimes' => 'Image must be in JPG, JPEG, or PNG format.',
                'stock.required' => 'Stock quantity is required.',
                'stock.numeric' => 'Stock must be a number.',
                'price.required' => 'Product price is required.',
                'price.numeric' => 'Price must be a valid number.',
                'description.required' => 'Product description is required.',
                'description.max' => 'Description must not exceed 500 characters.',
        ];
    }

}
