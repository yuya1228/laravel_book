<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'name' => 'required|unique:books,name',
            'image' => 'required',
            'text' => 'required',
            'category_id'=>'required|numeric',
            'quantity' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '本の名前を入力してください。',
            'image.required' => '画像を入れてください。',
            'text.required' => '本の内容を入力してください。',
            'category_id.required'=>'カテゴリーを選択してください。',
            'quantity.required' => '本の在庫を入力してください。'
        ];
    }
}
