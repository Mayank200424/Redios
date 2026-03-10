<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
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
            'product_id' => 'required|exists:products,id',
            'discount_value' => 'required|numeric|min:1|max:100',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ];
    }

    public function messages(){
        return [
            'product_id.required' => 'Please select a product.',
            'product_id.exists' => 'Selected product is invalid or does not exist.',
            'discount_value.required' => 'Discount value is required.',
            'discount_value.numeric' => 'Discount must be a number.',
            'discount_value.min' => 'Discount must be at least 1%.',
            'discount_value.max' => 'Discount cannot exceed 100%.',
            'start_date.required' => 'Start date is required.',
            'start_date.date' => 'Start date must be a valid date.',
            'start_date.after_or_equal' => 'Start date cannot be in the past.',
            'end_date.required' => 'End date is required.',
            'end_date.date' => 'End date must be a valid date.',
            'end_date.after_or_equal' => 'End date must be after or equal to the start date.',
        ];
    }

}
