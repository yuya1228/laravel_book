<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'email'=>'required|email',
            'role'=>'nullable',
            'password'=>'required',
        ];
    }

    public function message()
    {
        return[
            'name.required'=>'ユーザー名を入力してください。',
            'email.required'=>'メールアドレスを入力してください。',
            'password.required'=>'パスワードを入力してください。',
        ];
    }
}
