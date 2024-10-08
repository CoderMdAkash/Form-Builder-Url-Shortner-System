<?php

namespace Modules\DynamicFormCreation\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormTemplateRequest extends FormRequest
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
            'category_id' => ['required', 'integer', 'min:0'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
        ];
    }
}
