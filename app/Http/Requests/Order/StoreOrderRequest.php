<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'reference_num' => 'nullable|string|max:50',
            'user_id' => 'nullable',
            'payment_method' => 'required|string|max:50',
            'total' => 'required|numeric',
            'status' => 'nullable|string|max:50',
            'longitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
            'prescription_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
