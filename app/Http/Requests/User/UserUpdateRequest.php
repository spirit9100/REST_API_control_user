<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'sometimes|string|required|max:255',
            'comment' => 'string|nullable',
            'password' => 'string|size:8',

        ];
    }
    /**
     * Custom messages for validator errors.
     */
    public function messages(){
        return [
            'name.required' => 'Введите имя',
            'password.size' => 'Пароль должен быть не менее 8 символов',
        ];
    }
}
