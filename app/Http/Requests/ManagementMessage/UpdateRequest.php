<?php

namespace App\Http\Requests\ManagementMessage;

use App\Http\Requests\BaseRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'file' => 'nullable|file',
            // 'image_url' => 'nullable',
            'account' => 'nullable',
            'content' => 'nullable',
            'status' => 'required',
            'custom_time' => 'nullable',
            'is_hidden' => 'nullable'
        ];
    }
}
