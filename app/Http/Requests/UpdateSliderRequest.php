<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
            'image' => ['image', 'mimetypes:image/jpeg,image/png,image/webp'],
            'heading' => ['string', 'max:255'],
            'title' => ['string', 'max:255'],
            'description' => ['string', 'max:255'],
            'link' => ['string', 'max:255'],
            'type' => ['required']
        ];
    }
}
