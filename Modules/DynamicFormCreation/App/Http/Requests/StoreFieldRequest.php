<?php

namespace Modules\DynamicFormCreation\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFieldRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'form_template_id' => ['required'],
            'label' => ['required'],
            'type' => ['required'],
            'options' => ['nullable', 'array', 'min:1'],
            'order' => ['required']
        ];
    }
}
