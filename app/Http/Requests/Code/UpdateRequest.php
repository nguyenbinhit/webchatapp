<?php

namespace App\Http\Requests\Code;

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
            // check code is unique except for the current code
            'code' => 'required|string|unique:codes,code,' . $this->id,
            'status' => 'required|in:0,1',
            'note' => 'nullable',
        ];
    }
}
