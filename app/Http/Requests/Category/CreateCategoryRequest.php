<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateCategoryRequest extends FormRequest
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
            'name' => 'required|max:255',
            'name_nepali' => 'required|max:255',
            'parent_id' => [
                'sometimes', // Only apply the rule if parent_id is present in the request
                'nullable',  // Allow null values
                Rule::exists('categories', 'id'), // Validate existence in the categories table
            ],
        ];
    }
}
