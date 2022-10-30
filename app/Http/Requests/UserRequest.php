<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'user.name' => 'required|string|max:20',
            //'user.email' => 'required|string|max:255',
            //'user.password' => 'required|string|max:255',
            'user.self_introduction' => 'required|string|max:200',
            'user.age' => 'required|integer|max:100',
        ];
    }
}
