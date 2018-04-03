<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|max:55',
            'email' => 'required|email|max:55',
            'text' => 'required|max:255'
        ];
    }

    /**
     * Implement custom error messages.
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Please tell us your name',
            'email.required' => 'Please tell us your e-mail address',
            'email.email' => 'Please enter a valid email address',
            'text.required' => 'Please enter an enquiry'
        ];
    }
}
