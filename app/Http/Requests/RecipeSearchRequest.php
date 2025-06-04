<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeSearchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'author_email' => 'nullable|email|max:255',
            'keyword' => 'nullable|string|max:255',
            'ingredient' => 'nullable|string|max:255',
            'per_page' => 'nullable|integer|min:1|max:50',
        ];
    }

    public function validated($key = null, $default = null)
    {
        $validated = parent::validated();

        // Remove empty values
        return array_filter($validated, fn($value) => !empty($value));
    }
}
