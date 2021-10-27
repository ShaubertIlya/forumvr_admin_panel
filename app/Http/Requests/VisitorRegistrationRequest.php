<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitorRegistrationRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:8|same:password_confirmation',
            'password_confirmation' => 'required|same:password|min:8',
            'first_name' => 'required|min:3|string',
            'last_name' => 'required|min:3|string',
            'middle_name' => 'required|min:3|string',
            'phone' => 'required|min:10|max:11|string',
            'company' => 'required|string',
            'event_id' => 'required|exists:events,id'
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'Данное поле обязательно для заполнения',
            '*.min' => 'Данное поле не может иметь менее :min символов',
            '*.unique' => 'Такое значение уже занято',
            '*.string' => 'Данное поле должно быть строкой',
            '*.exists' => 'Данное значение не существует',
            '*.max' => 'Данное поле не может иметь более :max символов'
        ];
    }
}
