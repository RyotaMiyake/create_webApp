<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudyTimeRequest extends FormRequest
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
            'studytime.started_at' => 'required',
            'studytime.ended_at' => 'required',
        ];
    }
}
