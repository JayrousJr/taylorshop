<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Messagerequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50|min:5',
            'email' => 'required|email|min:3|max:255',
            'phone' => 'required|string|min:10',
            'subject' => 'required|string|min:5|max:255',
            'message' => 'required|string|min:10|max:500',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please type in your real name to send message',
            'email.required' => 'Please type in your email address to send message',
            'phone.required' => 'Please type in your phone number to send message',
            'subject.required' => 'Please type in your message subject to send message',
            'message.required' => 'Please type in your message',
        ];
    }
}
