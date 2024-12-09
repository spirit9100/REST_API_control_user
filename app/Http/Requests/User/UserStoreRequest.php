<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            //
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'comment' => 'string|nullable',
            'ip' => 'ip|nullable',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Имя пользователя обязательное поле',
            'email.required' => 'Email обязательное поле',
            'email.email' => 'Неверный формат Email',
            'email.unique' => 'Пользователь с таким Email уже существует',
            'password.required' => 'Пароль обязательное поле',
            'ip.ip' => 'Неверный формат IP адреса',
        ];
    }
}
