<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'num_of_users' => ['required', 'integer'],
            'date' => ['required'],
            'time' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'num_of_users.required' => '人数入力は必須です',
            'date.required' => '日付は必須です',
            'time.required' => '時間は必須です',
        ];
    }
}
