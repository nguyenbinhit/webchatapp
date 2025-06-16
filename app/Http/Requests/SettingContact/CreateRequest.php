<?php

namespace App\Http\Requests\SettingContact;

use App\Http\Requests\BaseRequest;

class CreateRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'phone' => 'required|string',
            'redirect_url' => 'nullable|url',
            'description' => 'nullable',
            'key_word' => 'nullable|string',
        ];
    }
}
