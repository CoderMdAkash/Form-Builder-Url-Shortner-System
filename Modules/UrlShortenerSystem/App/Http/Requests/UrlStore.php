<?php

namespace Modules\UrlShortenerSystem\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlStore extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'original_url' => 'required|string|max:255',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
