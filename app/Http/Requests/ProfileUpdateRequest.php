<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ic_number' => ['required', 'string', 'max:255', 'regex:/^[0-9]*$/'
        , Rule::unique('actor', 'ic')->ignore($this->user()->actor)],
            'username' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255', 'regex:/^[0-9]*$/'],
            'address' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:255', 'regex:/^[0-9]*$/'],
            'state' => ['required', 'integer', 'exists:state,stateID'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'ic_number.regex' => 'The IC number must be numeric.',
            'phone_number.regex' => 'The phone number must be numeric.',
        ];
    }
}
