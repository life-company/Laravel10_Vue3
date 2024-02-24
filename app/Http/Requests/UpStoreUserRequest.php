<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpStoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_name' => 'required|max:40',
            'client_post' => 'required|max:8|min:7',
            'client_address' => 'required|max:150',
            'client_url' => 'required|max:255',
            'client_person' => 'required|max:20',
            'client_person_phone' => 'required|max:13',
            'client_memo' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'client_name.required' => 'クライアント名は必須です。',
            'client_name.max' => 'クライアント名は40文字以内で登録してください。',
            'client_post.required' => '郵便番号は必須です。',
            'client_post.max' => '郵便番号は7文字以上、8文字以内で入力してください。',
            'client_post.min' => '郵便番号は7文字以上、8文字以内で入力してください。',
            'client_address.required' => '住所は必須です。',
            'client_address.max' => '住所は150文字以内で入力してください。',
            'client_url.required' => 'サイトURLは必須です。',
            'client_url.max' => 'サイトURLは150文字以内で入力してください。',
            'client_person.required' => '担当者名は必須です。',
            'client_person.max' => '担当者名は20文字以内で入力してください。',
            'client_person_phone.required' => '担当者の電話番号は必須です。',
            'client_person_phone.max' => '担当者の電話番号は13文字以内で入力してください。',
            'client_memo.required' => 'メモは必須です。',
            'client_memo.max' => 'メモは255文字以内で入力してください。',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $res = response()->json([
            'errors' => $validator->errors(),
            ],
            400);
        throw new HttpResponseException($res);
    }
}
