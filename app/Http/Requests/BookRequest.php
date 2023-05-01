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
            'book_name' => 'required|unique:books,book_name',
            'image' => 'required',
            'text' => 'required',
            'category_id'=>'required|numeric',
            'quantity' => 'required|numeric',
            'price'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'book_name.required' => '本の名前を入力してください。',
            'image.required' => '画像を入れてください。',
            'text.required' => '本の内容を入力してください。',
            'category_id.required'=>'カテゴリーを選択してください。',
            'quantity.required' => '本の在庫を入力してください。',
            'price.required'=>'価格を入力してください。'
        ];
    }
}
