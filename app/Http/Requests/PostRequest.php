<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //false
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'text' => 'required|min:3',


        ];
    }
    public function messages()
    {
        return [
          'title.required' => 'Поле должно быть заполнено',
          'text.required' => 'Поле должно быть заполнено',
            'title:min' => 'Не менее трех символов',
            'text:min' => 'Не менее трех символов'

        ];
    }
}
