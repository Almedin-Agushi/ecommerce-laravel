<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Categories\CreateCategoryRequest;

class CreateCategoryRequest extends FormRequest
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
            [
                'name'=> 'required|unique:categories',
                // Add any other fields that you want to validate

                // Check if the user making the request has the 'admin' role
                'user' => function($attribute, $value, $fail) {
                if (!auth()->check() || !auth()->user()->hasRole('admin')) {
                $fail('Only admin can add or edit categories.');
            }}
            ]
        ];
    }
}
