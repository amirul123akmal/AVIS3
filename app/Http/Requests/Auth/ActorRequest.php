<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ActorRequest extends FormRequest
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
            'fullname' => ['required', 'string', 'max:200', "regex:/^[a-z A-Z`']*$/"],
            'icnum' => ['required', 'string', 'min:12', 'max:12', 'unique:actor,ic', 'regex:/^[0-9]+$/'],
            'phoneNumber' => ['required', 'string', 'min:8', 'max:12', 'regex:/^[0-9]+$/'],
            'address' => ['required', 'string'],
            'postcode' => ['required', 'string', 'min:5', 'max:5'],
            'stateID' => ['required', 'integer', 'min:0', 'max:16']
        ];
    }

    public function messages(): array
    {
        return [
            'fullname.required' => 'Please provide your full name.',
            'icnum.required' => 'Please enter your IC number.',
            'icnum.min' => 'The IC number must be at least 12 characters.',
            'phoneNumber.required' => 'Please enter your phone number.',
            'phoneNumber.min' => 'The phone number must be at least 8 characters.',
            'phoneNumber.regex' => 'The phone number must contain only numeric characters.',
            'postcode.required' => 'Please enter your postcode.',
            'postcode.min' => 'Postcode need to have 5 digit',
            'stateID.required' => 'Please choose a state on the page.',
            'stateID.min' => 'You need to choose a valid state.',
        ];
    }
}
