<?php

namespace App\Http\Requests\Message;

use App\Http\Requests\BaseRequest;
use Illuminate\Support\Facades\Auth;

class CreateRequest extends BaseRequest
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
            'sender_id' => 'required',
            'receiver_id' => 'required',
            'content' => 'nullable',
            'custom_time' => 'nullable|string',
        ];
    }
}
