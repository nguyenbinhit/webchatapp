<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

class UpdateRequest extends BaseRequest
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
            'name' => ['string'],
            'email' => ['string', 'email', 'unique:users,email,' . $this->id],
            'password' => ['string', 'min:8'],
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.string' => 'Tên phải là chuỗi',

            'email.string' => 'Email phải là chuỗi',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',

            'password.string' => 'Mật khẩu phải là chuỗi',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
        ];
    }
}
